<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class PageController extends Controller
{
    // All Pages
    public function index()
        {
            $pages = Page::orderByRaw("CASE WHEN slug = 'home' THEN 0 WHEN slug = 'about-us' THEN 1 ELSE 2 END")
                        ->orderBy('id', 'ASC')
                        ->get();

            return view('admin.pages.index', compact('pages'));
        }


    // Create Page
    public function create()
    {
        return view('admin.pages.create');
    }

    // Store Page
    public function store(Request $request)
        {
            $validated = $request->validate([
                'title'             => 'required|string|max:255',
                'slug'              => 'nullable|string',
                'meta_title'        => 'nullable|string',
                'meta_description'  => 'nullable|string',
                'keywords'          => 'nullable|string',
            ]);

            $slug = $validated['slug'] ?: Str::slug($validated['title']);

            if (Page::where('slug', $slug)->exists()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'This slug already exists. Please choose another one.'
                ], 422);
            }

            $validated['slug'] = $slug;

            if (!empty($validated['keywords'])) {
                $validated['keywords'] = array_filter(array_map('trim', explode(',', $validated['keywords'])));
            } else {
                $validated['keywords'] = [];
            }

            Page::create($validated);

            return response()->json([
                'status' => 'success',
                'message' => 'Page created successfully!'
            ], 200);
        }



    // Edit Page + Sections + Widgets
    public function edit($id)
    {
        $page = Page::with('sections')->findOrFail($id);

        // all widget folders (auto-detect)
        $widgets = array_map('basename', glob(resource_path('views/admin/widgets/*'), GLOB_ONLYDIR));

        return view('admin.pages.edit', compact('page', 'widgets'));
    }

  // Update Page Details
        // Update Page
    public function update(Request $request, $id)
        {
            $page = Page::findOrFail($id);

            $validated = $request->validate([
                'title'             => 'required|string|max:255',
                'slug'              => 'nullable|string',
                'meta_title'        => 'nullable|string',
                'meta_description'  => 'nullable|string',
                'keywords'          => 'nullable|string', // comma separated string
            ]);

            // Slug auto & uniqueness
            $slug = $validated['slug'] ?: Str::slug($validated['title']);

            if (Page::where('slug', $slug)->where('id', '!=', $page->id)->exists()) {
                return back()->withErrors(['slug' => 'Slug already exists.'])->withInput();
            }
            $validated['slug'] = $slug;

            // KEYWORDS: Convert CSV to array
            if (!empty($validated['keywords'])) {
                $validated['keywords'] = array_filter(array_map('trim', explode(',', $validated['keywords'])));
            } else {
                $validated['keywords'] = [];
            }

            // Save normally — Laravel auto-json encodes array
            $page->update($validated);

            return back()->with('success', 'Page updated successfully!');
        }


    // renderSection
    public function renderSection($id)
{
    $section = PageSection::findOrFail($id);

    return view("widgets.$section->section_type.render", [
        'content' => $section->content,
        'section' => $section
    ])->render();
}
    // Add Section
    public function addSection(Request $request, $pageId)
    {
        $validated = $request->validate([
            'section_type' => 'required|string'
        ]);

        PageSection::create([
            'page_id' => $pageId,
            'section_type' => $validated['section_type'],
            'content' => [],
            'order_index' => PageSection::where('page_id', $pageId)->count() + 1
        ]);

        return back()->with('success', 'Section added successfully!');
    }
       

    public function updateSectionOrder(Request $request, Page $page)
        {
            foreach ($request->sections as $item) {
                PageSection::where('id', $item['id'])
                    ->update(['order_index' => $item['order_index']]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Section order updated!'
            ]);
        }

public function latest()
{
    $pages = Page::select('title', 'created_at')
                 ->orderBy('created_at', 'desc')
                 ->take(10)
                 ->get();

    return response()->json([
        'status' => 'success',
        'pages' => $pages
    ]);
}
        public function destroy($id)
        {
            $page = Page::findOrFail($id);

            // Prevent deleting fixed pages
            if (in_array($page->slug, ['home', 'about-us'])) {
                return back()->with('error', 'Home or About Us page cannot be deleted.');
            }

            $page->delete();

            return back()->with('success', 'Page deleted successfully.');
        }


//     // Update Section Content (Widget Save)
//    public function updateSection(Request $request, $id)
// {
//     $section = PageSection::findOrFail($id);

//     // JSON from hidden input
//     $content = json_decode($request->content_json ?? "[]", true);
//     echo "here is all the content logeggeg ";
//     dd($request->all());

//     // Handle file uploads
//     foreach ($request->allFiles() as $key => $file) {

//         if (is_array($file)) {
//             foreach ($file as $idx => $f) {
//                 $path = $f->store('uploads', 'public');
//                 $content['cards'][$idx]['image'] = $path;
//             }
//         } else {
//             $path = $file->store('uploads', 'public');
//             $content[$key] = $path;
//         }
//     }

//     $section->update([
//         'content' => $content
//     ]);

//     return back()->with('success', 'Section updated!');
// }


//     // Delete Section
//     public function deleteSection($id)
//     {
//         PageSection::findOrFail($id)->delete();
//         return back()->with('success', 'Section deleted!');
//     }
}
