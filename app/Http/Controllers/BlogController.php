<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
{
    $query = Blog::query();

            // 🔍 Search + Tags filter
            if ($request->search) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'LIKE', "%{$request->search}%")
                    ->orWhere('content', 'LIKE', "%{$request->search}%")
                    ->orWhere('tags', 'LIKE', "%{$request->search}%");
                });
            }

            if ($request->tag) {
                $query->whereJsonContains('tags', $request->tag);
            }


    $blogs = $query->orderBy('id', 'desc')->paginate(3);

    // Return complete blog object you saved in DB
    $blogs->getCollection()->transform(function ($blog) {

        return [
            "id"        => $blog->id,
            "title"     => $blog->title,
            "slug"      => $blog->slug,
            "reading_time" => $blog->reading_time,
            "thumbnail" => $blog->thumbnail,   // <-- correct key
            "author"    => $blog->author,      // array
            "tags"      => $blog->tags,
            "content"   => $blog->content,
            "meta_description" => $blog->meta_description,
            "created_at" => $blog->created_at->toDateTimeString(),
            "updated_at" => $blog->updated_at->toDateTimeString(),
        ];
    });

    return response()->json($blogs);
}




     public function store(Request $request)
        {
            // Decode main blog JSON object
            $blogData = json_decode($request->blog, true);

            if (!$blogData || !is_array($blogData)) {
                return response()->json(['message' => 'Invalid blog JSON'], 422);
            }

            /* ---------------------------------
            * UPLOAD THUMBNAIL IMAGE
            * ---------------------------------*/
            $thumbnailUrl = null;

            if ($request->hasFile('thumbnail')) {

                // Save inside storage/app/public/blogThumbnail
                $path = $request->file('thumbnail')->store('blogThumbnail', 'public');

                // Accessible URL
                $thumbnailUrl = 'storage/' . $path;
            }

            /* ---------------------------------
            * UPLOAD AUTHOR IMAGE
            * ---------------------------------*/
            if ($request->hasFile('author_image')) {

                // Save inside storage/app/public/blogAuthor
                $path = $request->file('author_image')->store('blogAuthor', 'public');

                // Set inside blogData JSON
                $blogData['author']['image'] = 'storage/' . $path;
            }

            /* ---------------------------------
            * SAVE BLOG
            * ---------------------------------*/
            $blog = Blog::create([
                'title' => $blogData['title'],
                'author' => $blogData['author'],
                'content' => $blogData['content'],
                'reading_time' => $blogData['reading_time'],
                'tags' => $blogData['tags'],
                'meta_description' => $blogData['meta_description'],

                // newly added:
                'thumbnail' => $thumbnailUrl,

                // comments empty on create
                'comments' => [],
            ]);

            return response()->json([
                'message' => 'Blog created successfully',
                'data' => $blog
            ], 201);
        }


    public function show(Blog $blog)
    {
        return $blog;
    }

   public function AddComment(Request $request)
{
    // Validate inputs
    $request->validate([
        'blog_id' => 'required|integer|exists:blogs,id',
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'phone'   => 'nullable|string|max:50',
        'message' => 'required|string',
    ]);

    // Find blog
    $blog = Blog::find($request->blog_id);

    // Existing comments OR new empty array
    $comments = $blog->comments ?? [];

    // New comment entry
    $newComment = [
        'name'    => $request->name,
        'email'   => $request->email,
        'phone'   => $request->phone,
    // Keep your frontend DATE FORMAT - JS uses c.date
        'date'    => now()->toDateTimeString(),
        'message' => $request->message,
    ];

    // Push comment
    $comments[] = $newComment;

    // Save
    $blog->comments = $comments;
    $blog->save();

    // Return full updated comments (your JS needs it)
    return response()->json([
        'message'  => 'Comment added successfully',
        'comments' => $comments
    ], 201);
}


  public function update(Request $request, Blog $blog)
{
    $blogData = json_decode($request->blog, true);

    if (!$blogData || !is_array($blogData)) {
        return response()->json(['message' => 'Invalid blog JSON'], 422);
    }

    /* ---------------------------------
     * UPDATE THUMBNAIL
     * ---------------------------------*/
    if ($request->hasFile('thumbnail')) {

        // delete old file
        if ($blog->thumbnail) {
            $oldPath = public_path($blog->thumbnail); // storage/blogThumbnail/abc.jpg
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // upload new file
        $file = $request->file('thumbnail');
        $newName = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('storage/blogThumbnail'), $newName);

        // save URL path in DB
        $blogData['thumbnail'] = "storage/blogThumbnail/" . $newName;

    } else {
        $blogData['thumbnail'] = $blog->thumbnail;
    }


    /* ---------------------------------
     * UPDATE AUTHOR IMAGE
     * ---------------------------------*/
    if ($request->hasFile('author_image')) {

        if (!empty($blog->author['image'])) {
            $oldAuthorPath = public_path($blog->author['image']);
            if (file_exists($oldAuthorPath)) {
                unlink($oldAuthorPath);
            }
        }

        $file = $request->file('author_image');
        $newName = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('storage/blogAuthor'), $newName);

        $blogData['author']['image'] = "storage/blogAuthor/" . $newName;

    } else {
        $blogData['author']['image'] = $blog->author['image'] ?? null;
    }


    /* ---------------------------------
     * SAVE UPDATED BLOG
     * ---------------------------------*/
    $blog->update([
        'title'             => $blogData['title'],
        'author'            => $blogData['author'],
        'content'           => $blogData['content'],
        'reading_time'      => $blogData['reading_time'],
        'tags'              => $blogData['tags'],
        'meta_description'  => $blogData['meta_description'],
        'thumbnail'         => $blogData['thumbnail'],
    ]);

    return response()->json([
        'message' => 'Blog updated successfully',
        'data' => $blog
    ]);
}


  public function destroy(Blog $blog)
{
    /* ===================================================
     * 1. DELETE THUMBNAIL (if exists)
     * ===================================================*/
    if (!empty($blog->thumbnail)) {
        $thumbPath = public_path($blog->thumbnail); // storage/blogThumbnail/abc.jpg
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }
    }

    /* ===================================================
     * 2. DELETE AUTHOR IMAGE (if exists)
     * ===================================================*/
    if (!empty($blog->author['image'])) {
        $authorPath = public_path($blog->author['image']);
        if (file_exists($authorPath)) {
            unlink($authorPath);
        }
    }

    /* ===================================================
     * 3. DELETE ALL IMAGES INSIDE blog->content
     *    TinyMCE stores urls like:
     *    storage/blogEditor/image/file.png
     *    storage/blogEditor/video/file.mp4
     * ===================================================*/

    $content = $blog->content;

    // Regex → extract ALL src="storage/..."
    preg_match_all('/src=["\'](storage\/[^"\']+)["\']/', $content, $matches);

    if (!empty($matches[1])) {
        foreach ($matches[1] as $url) {

            // Convert to full server path
            $path = public_path($url);

            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

    /* ===================================================
     * 4. DELETE BLOG FROM DATABASE
     * ===================================================*/
    $blog->delete();

    return response()->json(['message' => 'Blog deleted and all files removed']);
}
public function listIdsAndTitles()
{
    $blogs = Blog::select('id', 'title')
                 ->orderBy('id', 'desc')
                 ->get()
                 ->map(function ($blog) {
                     return [
                         'id'    => $blog->id,
                         'title' => $blog->title,
                     ];
                 });

    return response()->json([
        'status' => 'success',
        'data'   => $blogs
    ]);
}


}
