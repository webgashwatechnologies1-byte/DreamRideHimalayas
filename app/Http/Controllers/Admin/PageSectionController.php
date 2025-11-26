<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Models\Packages;

class PageSectionController extends Controller
{
    /* ============================================================
       STORE
    ============================================================ */
    public function store(Request $request)
    {
        $request->validate([
            'page_id'      => 'required|integer',
            'section_type' => 'required|string',
            'order_index'  => 'required|integer',
            'content'      => 'nullable|array',
        ]);

        $incoming = $request->input('content', []);
        $files    = $request->allFiles()['content'] ?? [];

        // Process content
        $final = $this->processContent($incoming, $files, []);

        $section = PageSection::create([
            'page_id'      => $request->page_id,
            'section_type' => $request->section_type,
            'order_index'  => $request->order_index,
            'content'      => $final,
        ]);

        return response()->json(['status' => 'success', 'section' => $section]);
    }


    /* ============================================================
       UPDATE  → REPLACE FULL CONTENT
    ============================================================ */
    public function update(Request $request, PageSection $pageSection)
    {
        $incoming = $request->input('content', []);
        $files    = $request->allFiles()['content'] ?? [];
        $existing = $pageSection->content ?? [];

        // DELETE MEDIA THAT WAS REMOVED IN THE FORM
        $this->deleteRemovedMedia($existing, $incoming);

        // Process updated content
        $final = $this->processContent($incoming, $files, $existing);

        // Replace content fully
        $pageSection->update(['content' => $final]);

        return response()->json(['status' => 'success', 'section' => $pageSection]);
    }


    /* ============================================================
       RECURSIVE ENGINE: PROCESS CONTENT
       - Handles image/video replacement, deletion, keeping
    ============================================================ */
    private function processContent(array $incoming, array $files, array $existing)
    {
        $result = [];

        foreach ($incoming as $key => $value) {

            /* -------- SUBARRAY -------- */
            if (is_array($value)) {
                $result[$key] = $this->processContent(
                    $value,
                    $files[$key] ?? [],
                    $existing[$key] ?? []
                );
                continue;
            }

            /* -------- MEDIA FIELDS -------- */
            if ($key === 'image' || $key === 'video') {

                $uploaded = $files[$key] ?? null;

                // CASE 1: NEW FILE UPLOADED
                if ($uploaded instanceof UploadedFile) {

                    if (!empty($existing[$key])) {
                        $old = public_path($existing[$key]);
                        if (file_exists($old)) @unlink($old);
                    }

                    $result[$key] = $this->uploadFile($uploaded);
                    continue;
                }

                // CASE 2: STRING PATH → KEEP AS IS
                if (is_string($value) && $value !== '') {
                    $result[$key] = $value;
                    continue;
                }

                // CASE 3: NOTHING → REMOVE
                continue;
            }

            /* -------- NORMAL FIELDS -------- */
            $result[$key] = $value;
        }

        return $result;
    }


    /* ============================================================
       DETECT REMOVED MEDIA (when user deletes card/image)
    ============================================================ */
    private function deleteRemovedMedia($existing, $incoming)
    {
        if (!is_array($existing)) return;

        foreach ($existing as $key => $value) {

            if (is_array($value)) {
                $this->deleteRemovedMedia($value, $incoming[$key] ?? []);
                continue;
            }

            if (($key === 'image' || $key === 'video') && !isset($incoming[$key])) {
                if (is_string($value) && str_contains($value, 'uploads/')) {

                    $full = public_path($value);
                    if (file_exists($full)) @unlink($full);
                }
            }
        }
    }


    /* ============================================================public_path("uploads
       UPLOAD FILE
    ============================================================ */
    private function uploadFile(UploadedFile $file): string
    {
        $dir = public_path('uploads/sections');

        if (!is_dir($dir)) mkdir($dir, 0755, true);

        $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $name);

        return "uploads/sections/" . $name;
    }


    /* ============================================================
       DESTROY SECTION + ALL MEDIA
    ============================================================ */
    public function destroy(PageSection $pageSection)
    {
        $this->unlinkAllMedia($pageSection->content ?? []);
        $pageSection->delete();

        return response()->json(['status' => 'success']);
    }

    private function unlinkAllMedia($content)
    {
        if (!is_array($content)) return;

        foreach ($content as $key => $value) {

            if (is_array($value)) {
                $this->unlinkAllMedia($value);
                continue;
            }

            if (($key === 'image' || $key === 'video') && is_string($value)) {

                $full = public_path($value);
                if (file_exists($full)) @unlink($full);
            }
        }
    }


   public function postsUpdate(Request $request, PageSection $pageSection)
            {
                // Validate incoming content array
                $request->validate([
                    'content' => 'required|array',
                ]);

                $incoming = $request->content;
                $existing = $pageSection->content ?? [];

                $final = [
                    'title'    => $incoming['title'] ?? '',
                    'subtitle' => $incoming['subtitle'] ?? '',
                    'cards'    => [],
                ];

                if (!empty($incoming['cards'])) {

                    foreach ($incoming['cards'] as $index => $cardInput) {

                        $cardFinal = [];

                        // ICON
                        $cardFinal['icon'] = $cardInput['icon'] ?? '';

                        // IMAGE
                        $fileKey = "content.cards.$index.image";

                        if ($request->hasFile($fileKey)) {

                            // delete old image
                            if (!empty($existing['cards'][$index]['image'])) {
                                $oldPath = dirname(base_path()) . '/public_html/' . $existing['cards'][$index]['image'];
                                if (file_exists($oldPath)) unlink($oldPath);
                            }

                            // upload new image outside Laravel
                            $file = $request->file($fileKey);
                            $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                            $publicHtmlRoot = dirname(base_path()) . '/public_html';
                            $destination = $publicHtmlRoot . '/storage/posts';

                            if (!file_exists($destination)) {
                                mkdir($destination, 0755, true);
                            }

                            $file->move($destination, $name);

                            $cardFinal['image'] = "storage/posts/" . $name;

                        } else {
                            // keep old image
                            $cardFinal['image'] = $existing['cards'][$index]['image'] ?? '';
                        }

                        $final['cards'][] = $cardFinal;
                    }
                }

                // SAVE
                $pageSection->update(['content' => $final]);

                return response()->json([
                    'status'  => 'success',
                    'message' => 'Posts section updated',
                    'section' => $pageSection
                ]);
            }



     public function toursUpdate(Request $request, PageSection $pageSection)
            {
                $incoming = $request->input('content', []);

                // packages[] is already array of IDs
                $content = [
                    'title' => $incoming['title'] ?? '',
                    'subtitle' => $incoming['subtitle'] ?? '',
                    'packages' => $incoming['packages'] ?? []
                ];

                $pageSection->update(['content' => $content]);

                return response()->json(['status' => 'success']);
            }

    public function worldUpdate(Request $request, PageSection $pageSection)
        {
            $request->validate([
                'content' => 'required|array',
            ]);

            $incoming = $request->input('content', []);
            $existing = $pageSection->content ?? [];

            // world widget contains NO FILES
            // so simply merge incoming
            $content = $incoming;

            $pageSection->update([
                'content' => $content
            ]);

            return response()->json([
                'status' => 'success',
                'section' => $pageSection
            ]);
        }


    public function testimonialsUpdate(Request $request, PageSection $pageSection)
                {
                    $existing = $pageSection->content ?? [];
                    $content = $existing;

                    /* -----------------------------
                    * 1. HANDLE MAIN IMAGES
                    * ----------------------------- */
                    foreach (['image1', 'image2'] as $field) {

                        if ($request->hasFile("content.$field")) {

                            // delete old file safely (if exists)
                            if (!empty($existing[$field])) {
                                $oldPath = public_path($existing[$field]); // storage/uploads/testimonials/...
                                if (file_exists($oldPath)) unlink($oldPath);
                            }

                            // upload new file
                            $file = $request->file("content.$field");
                            $filename = time() . "_" . $file->getClientOriginalName();
                            $file->move(public_path("storage/uploads/testimonials"), $filename);

                            // store path in DB
                            $content[$field] = "storage/uploads/testimonials/" . $filename;
                        }
                    }

                    /* -----------------------------
                    * 2. HANDLE REVIEWS
                    * ----------------------------- */
                    $content['reviews'] = [];
                    $reviewsInput = $request->input('content.reviews') ?? [];

                    foreach ($reviewsInput as $i => $reviewData) {

                        $review = [
                            "name"        => $reviewData['name'] ?? "",
                            "description" => $reviewData['description'] ?? "",
                        ];

                        // old image path if exists
                        $oldImage = $existing['reviews'][$i]['image'] ?? "";

                        // new file uploaded?
                        if ($request->hasFile("content.reviews.$i.image")) {

                            // delete old image
                            if ($oldImage) {
                                $oldPath = public_path($oldImage);
                                if (file_exists($oldPath)) unlink($oldPath);
                            }

                            // upload new image
                            $file = $request->file("content.reviews.$i.image");
                            $filename = time() . "_" . $file->getClientOriginalName();
                            $file->move(public_path("storage/uploads/testimonials"), $filename);

                            $review["image"] = "storage/uploads/testimonials/" . $filename;

                        } else {
                            // keep old one
                            $review["image"] = $oldImage;
                        }

                        $content['reviews'][] = $review;
                    }

                    /* -----------------------------
                    * 3. SAVE
                    * ----------------------------- */
                    $pageSection->update([
                        'content' => $content
                    ]);

                    return response()->json([
                        "status"  => "success",
                        "message" => "Testimonials updated successfully",
                        "content" => $content
                    ]);
                }


     public function subHeroUpdate(Request $request, PageSection $pageSection)
                {
                    $content = $pageSection->content ?? [];

                    /* ------------------------------
                    HANDLE MAIN TEXT FIELDS
                    ------------------------------*/
                    $content['title']       = $request->input('content.title', '');
                    $content['subtitle']    = $request->input('content.subtitle', '');
                    $content['description'] = $request->input('content.description', '');
                    $content['btn']         = $request->input('content.btn', '');
                    $content['btnurl']      = $request->input('content.btnurl', '');
                    $content['sidebar']     = $request->input('content.sidebar', '');
                    $content['head']        = $request->input('content.head', '');
                    $content['body']        = $request->input('content.body', '');

                    /* ------------------------------
                    HANDLE MAIN IMAGES
                    ------------------------------*/
                    // imageback
                    if ($request->hasFile('content.imageback')) {
                        if (!empty($content['imageback']) && file_exists(public_path($content['imageback']))) {
                            unlink(public_path($content['imageback']));
                        }

                        $file = $request->file('content.imageback');
                        $name = time() . "_back_" . $file->getClientOriginalName();
                        $file->move(public_path("uploads/subhero"), $name);
                        $content['imageback'] = "uploads/subhero/" . $name;
                    }

                    // imagefront
                    if ($request->hasFile('content.imagefront')) {
                        if (!empty($content['imagefront']) && file_exists(public_path($content['imagefront']))) {
                            unlink(public_path($content['imagefront']));
                        }

                        $file = $request->file('content.imagefront');
                        $name = time() . "_front_" . $file->getClientOriginalName();
                        $file->move(public_path("uploads/subhero"), $name);
                        $content['imagefront'] = "uploads/subhero/" . $name;
                    }

                    /* ------------------------------
                    HANDLE CARDS
                    ------------------------------*/
                    $cards = [];

                    if ($request->has('content.cards')) {
                        foreach ($request->input('content.cards') as $index => $cardData) {
                            $cards[] = [
                                "icon"        => $cardData['icon'] ?? "",
                                "title"       => $cardData['title'] ?? "",
                                "description" => $cardData['description'] ?? "",
                            ];
                        }
                    }

                    $content['cards'] = $cards;

                    /* ------------------------------
                    SAVE FINAL CONTENT
                    ------------------------------*/
                    $pageSection->update([
                        'content' => $content
                    ]);

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Sub Hero Updated',
                        'content' => $content
                    ]);
                }
    public function statsUpdate(Request $request, PageSection $pageSection)
            {
                $content = $pageSection->content ?? [];
                $cards = [];

                if ($request->has('content.cards')) {
                    foreach ($request->content['cards'] as $index => $cardData) {

                        $card = [
                            "title"     => $cardData['title'] ?? "",
                            "subtitle"  => $cardData['subtitle'] ?? "",
                            "image"     => $content['cards'][$index]['image'] ?? ""
                        ];

                        // IMAGE UPLOAD (PHP native move)
                        if ($request->hasFile("content.cards.$index.image")) {
                            $file = $request->file("content.cards.$index.image");
                            $filename = time() . "_" . $file->getClientOriginalName();
                            $path = "uploads/stats/" . $filename;

                            $file->move(public_path("uploads/stats"), $filename);
                            $card["image"] = "uploads/stats/" . $filename;
                        }

                        $cards[] = $card;
                    }
                }

                $content['cards'] = $cards;

                $pageSection->update([
                    'content' => $content
                ]);

                return response()->json([
                    "status" => "success",
                    "message" => "Stats updated!",
                    "content" => $content
                ]);
            }
    public function backbannerUpdate(Request $request, PageSection $pageSection)
        {
            $content = $pageSection->content ?? [];

            // IMAGE
            if ($request->hasFile("content.image")) {

                // remove old
                if (!empty($content["image"]) && file_exists(public_path($content["image"]))) {
                    unlink(public_path($content["image"]));
                }

                $file = $request->file("content.image");
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path("uploads/backbanner"), $name);

                $content["image"] = "uploads/backbanner/" . $name;
            }

            // TITLE
            $content["title"] = $request->input("content.title");

            // Save
            $pageSection->update([
                "content" => $content
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Backbanner updated!",
                "content" => $content
            ]);
        }

    public function termsConditionssUpdate(Request $request, PageSection $pageSection)
            {
                $content = $pageSection->content ?? [];

                 $content['title']  = $request->input('content.title');
                $content['cards']  = $request->input('content.cards', []);

                $pageSection->update([
                    'content' => $content
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Terms & Conditions updated successfully!',
                    'content' => $content
                ]);
            }
   public function herobannerUpdate(Request $request, PageSection $pageSection)
        {
            $content = $pageSection->content ?? [];

            // -----------------------------
            // 1. SIMPLE TEXT FIELDS
            // -----------------------------
            $content['subtitle'] = $request->input('content.subtitle', '');
            $content['title1']   = $request->input('content.title1', '');
            $content['title2']   = $request->input('content.title2', '');
            $content['titles']   = $request->input('content.titles', []);

            // -----------------------------
            // 2. SLIDER IMAGES
            // -----------------------------
            $images = [];

            if ($request->has('content.images')) {
                foreach ($request->input('content.images') as $i => $imgData) {

                    $img = [
                        'url'   => $imgData['url'] ?? '',
                        'index' => $i
                    ];

                    // NEW FILE UPLOADED
                    if ($request->hasFile("content.images.$i.file")) {
                        $file = $request->file("content.images.$i.file");

                        $folder = "uploads/hero";
                        $filename = time() . "_" . $file->getClientOriginalName();

                        $file->move(public_path($folder), $filename);

                        $img['url'] = "$folder/$filename";
                    }

                    // KEEP EXISTING URL IF NO NEW FILE
                    $images[] = $img;
                }
            }

            $content['images'] = $images;

            // -----------------------------
            // 3. CHECKS (icon + text)
            // -----------------------------
            $checks = [];

            if ($request->has('content.checks')) {
                foreach ($request->input('content.checks') as $chk) {
                    $checks[] = [
                        'icon' => $chk['icon'] ?? '',
                        'text' => $chk['text'] ?? ''
                    ];
                }
            }

            $content['checks'] = $checks;

            // -----------------------------
            // 4. SAVE CONTENT
            // -----------------------------
            $pageSection->update([
                'content' => $content
            ]);

            return response()->json([
                'status'  => 'success',
                'content' => $content
            ]);
        }

    public function subhero2Update(Request $request, PageSection $pageSection)
            {
                $content = $pageSection->content ?? [];

                /* -----------------------------
                LEFT SIDE
                ------------------------------*/
                $left = $content['left'] ?? [];

                // TEXT & VIDEO URL
                $left['text']       = $request->input('content.left.text', '');
                $left['ytvideourl'] = $request->input('content.left.ytvideourl', '');

                // IMAGE UPLOAD
                if ($request->hasFile('content.left.image')) {
                    $file = $request->file('content.left.image');

                    $folder = "uploads/subhero2";
                    $name = time() . "_" . $file->getClientOriginalName();
                    $file->move(public_path($folder), $name);

                    $left['image'] = "$folder/$name";
                }

                /* -----------------------------
                RIGHT SIDE
                ------------------------------*/
                $right = $content['right'] ?? [];

                $right['title']       = $request->input('content.right.title', '');
                $right['subtitle']    = $request->input('content.right.subtitle', '');
                $right['description'] = $request->input('content.right.description', '');
                $right['btntext']     = $request->input('content.right.btntext', '');
                $right['btnurl']      = $request->input('content.right.btnurl', '');
                $right['footertext']  = $request->input('content.right.footertext', '');

                // CARDS
                $cards = [];
                if ($request->has('content.right.cards')) {
                    foreach ($request->input('content.right.cards') as $item) {
                        $cards[] = [
                            "icon"    => $item['icon'] ?? "",
                            "heading" => $item['heading'] ?? "",
                            "text"    => $item['text'] ?? ""
                        ];
                    }
                }

                $right['cards'] = $cards;

                /* -----------------------------
                MERGE & SAVE
                ------------------------------*/
                $content['left']  = $left;
                $content['right'] = $right;

                $pageSection->update(['content' => $content]);

                return response()->json([
                    "status"  => "success",
                    "content" => $content
                ]);
            }
    public function featuredTourUpdate(Request $request, PageSection $pageSection)
        {
            $cards = [];

            foreach ($request->input('content.cards', []) as $card) {
                $cards[] = [
                    "tour"     => intval($card['tour'] ?? 0),
                    "packages" => array_map('intval', $card['packages'] ?? []),
                ];
            }

            $pageSection->update([
                'content' => [
                    "title"    => $request->input('content.title'),
                    "subtitle" => $request->input('content.subtitle'),
                    "cards"    => $cards
                ]
            ]);

            return response()->json([
                "status"  => "success",
                "content" => $pageSection->content
            ]);
        }

   public function activitiesUpdate(Request $request, PageSection $pageSection)
        {
            $cards = [];

            $inputCards = $request->input('content.cards', []);

            foreach ($inputCards as $i => $card) {

                $image = $card['image'] ?? null;

                // Correct: Now checking file as content.cards.i.file
                if ($request->hasFile("content.cards.$i.file")) {
                    $uploaded = $request->file("content.cards.$i.file")
                        ->store("uploads/activities/cards", "public");

                    $image = $uploaded;
                }

                $cards[] = [
                    "image"   => $image,
                    "heading" => $card['heading'] ?? "",
                ];
            }

            // Back Image
            $backImage = $request->input('content.backImage');

            if ($request->hasFile('content.backImage')) {
                $backImage = $request->file('content.backImage')
                    ->store("uploads/activities", "public");
            }

            $pageSection->update([
                "content" => [
                    "title"     => $request->input('content.title'),
                    "backImage" => $backImage,
                    "cards"     => $cards
                ]
            ]);

            return response()->json([
                "status"  => "success",
                "content" => $pageSection->content
            ]);
        }
    
   public function offbannerUpdate(Request $request, PageSection $pageSection)
        {
            // Collect Right side package IDs
            $rightPackages = collect($request->input('content.right', []))
                ->map(fn($id) => intval($id))
                ->filter()
                ->values()
                ->toArray();

            $pageSection->update([
                "content" => [
                    "left" => [
                        "title"       => $request->input("content.left.title"),
                        "subtitle"    => $request->input("content.left.subtitle"),
                        "description" => $request->input("content.left.description"),

                        "button" => [
                            "text" => $request->input("content.left.button.text"),
                            "url"  => $request->input("content.left.button.url"),
                        ],

                        "off" => [
                            "value"       => $request->input("content.left.off.value"),
                            "text"        => $request->input("content.left.off.text"),
                            "description" => $request->input("content.left.off.description"),
                        ],

                        "footer" => [
                            "text"          => $request->input("content.left.footer.text"),
                            "validTillDate" => $request->input("content.left.footer.validTillDate"),
                        ]
                    ],

                    "right" => $rightPackages
                ]
            ]);

            return response()->json([
                "status"  => "success",
                "content" => $pageSection->content
            ]);
        }

    public function bannerBlogUpdate(Request $request, PageSection $pageSection)
            {
                $content = $pageSection->content ?? [];

                // Image upload
                $image = $content['image'] ?? null;

                if ($request->hasFile('content.image')) {
                    $image = $request->file('content.image')->store("uploads/bannerblog", "public");
                }

                // Button
                $btn = [
                    "btntext" => $request->input("content.button.btntext"),
                    "btnurl"  => $request->input("content.button.btnurl"),
                ];

                // Save
                $pageSection->update([
                    "content" => [
                        "title"   => $request->input('content.title'),
                        "subtitle"=> $request->input('content.subtitle'),
                        "image"   => $image,
                        "button"  => $btn,
                    ]
                ]);

                return response()->json([
                    "status" => "success",
                    "content" => $pageSection->content
                ]);
            }
    public function counterBannerUpdate(Request $request, PageSection $pageSection)
            {
                $content = $pageSection->content ?? [];

                /* -------------------------
                MAIN BANNER IMAGE
                --------------------------*/
                $image = $content['image'] ?? null;

                if ($request->hasFile('content.image')) {
                    $image = $request->file('content.image')->store("uploads/counterbanner", "public");
                }

                /* -------------------------
                BUILD CARDS
                --------------------------*/
                $cards = [];

                foreach ($request->input('content.cards', []) as $i => $card) {

                    $img = $card['image'] ?? null;

                    // upload if new file exists
                    if ($request->hasFile("content.cards.$i.file")) {
                        $img = $request->file("content.cards.$i.file")->store("uploads/counterbanner/cards", "public");
                    }

                    $cards[] = [
                        "number"  => $card['number'] ?? "",
                        "title"   => $card['title'] ?? "",
                        "image"   => $img,
                    ];
                }

                /* -------------------------
                SAVE CONTENT
                --------------------------*/
                $pageSection->update([
                    "content" => [
                        "title"       => $request->input('content.title'),
                        "description" => $request->input('content.description'),
                        "image"       => $image,
                        "button" => [
                            "btntext" => $request->input("content.button.btntext"),
                            "btnurl"  => $request->input("content.button.btnurl"),
                        ],
                        "cards"       => $cards
                    ]
                ]);

                return response()->json([
                    "status" => "success",
                    "content" => $pageSection->content
                ]);
            }
    public function viewtourUpdate(Request $request, PageSection $pageSection)
        {
            $tours = $request->input('content.tours', []);

            $tours = collect($tours)
                        ->map(fn($id) => (int)$id)
                        ->filter()
                        ->values()
                        ->toArray();

            $pageSection->update([
                "content" => [
                    "title"    => $request->input('content.title'),
                    "subtitle" => $request->input('content.subtitle'),
                    "button"   => [
                        "text" => $request->input('content.button.text'),
                        "url"  => $request->input('content.button.url'),
                    ],
                    "tours" => $tours
                ]
            ]);

            return response()->json([
                "status"  => "success",
                "content" => $pageSection->content
            ]);
        }


    public function adventuresUpdate(Request $request, PageSection $pageSection)
            {
                $cards = [];

                foreach ($request->input('content.cards', []) as $card) {

                    $cards[] = [
                        "title" => $card["title"] ?? "",
                        "tours" => array_map('intval', $card["tours"] ?? []),
                    ];
                }

                $pageSection->update([
                    "content" => [
                        "title"    => $request->input('content.title'),
                        "subtitle" => $request->input('content.subtitle'),
                        "cards"    => $cards
                    ]
                ]);

                return response()->json([
                    "status"  => "success",
                    "content" => $pageSection->content
                ]);
            }
    public function blogBannerUpdate(Request $request, PageSection $pageSection)
    {
        $content = [
            'title'    => $request->input('content.title'),
            'subtitle' => $request->input('content.subtitle'),
            'main'     => [
                'blogid' => intval($request->input('content.main.blogid'))
            ],
            'blogs'    => array_slice(
                array_map('intval', $request->input('content.blogs', [])),
                0, 3 // max 3
            )
        ];

        $pageSection->update(['content' => $content]);

        return response()->json([
            'status' => 'success',
            'content' => $pageSection->content
        ]);
    }

    public function contactBannerUpdate(Request $request, PageSection $pageSection)
            {
                // Handle image upload if provided
                $imagePath = $pageSection->content['image'] ?? null;

                if ($request->hasFile('content.image')) {
                    $imagePath = $request->file('content.image')->store('contactbanner', 'public');
                }

                $pageSection->update([
                    'content' => [
                        "image"          => $imagePath,
                        "title"          => $request->input('content.title'),
                        "subtitle"       => $request->input('content.subtitle'),
                        "contactmessage" => $request->input('content.contactmessage'),
                        "yturl"          => $request->input('content.yturl'),
                    ]
                ]);

                return response()->json([
                    "status"  => "success",
                    "content" => $pageSection->content
                ]);
            }

        public function TeamSection(Request $request, PageSection $pageSection)
            {
                $content = $pageSection->content ?? [
                    "title"   => "",
                    "subtitle"=> "",
                    "card"    => []
                ];

                // LOOP CARDS
                $cards = [];

                if ($request->has("content.card")) {

                    foreach ($request->content["card"] as $index => $cardData) {

                        // IMAGE handling
                        $imagePath = $content["card"][$index]["image"] ?? null;

                        if (isset($cardData["image"]) && $cardData["image"] instanceof \Illuminate\Http\UploadedFile) {
                            $imagePath = $cardData["image"]->store('team', 'public');
                        }

                        // LINKS (social icons)
                        $links = [];

                        if (isset($cardData["links"])) {
                            foreach ($cardData["links"] as $link) {
                                $links[] = [
                                    "iconClassName" => $link["iconClassName"] ?? "",
                                    "url"           => $link["url"] ?? "",
                                ];
                            }
                        }

                        $cards[] = [
                            "image"    => $imagePath,
                            "name"     => $cardData["name"] ?? "",
                            "position" => $cardData["position"] ?? "",
                            "links"    => $links,
                        ];
                    }
                }

                // UPDATE SECTION CONTENT
                $pageSection->update([
                    "content" => [
                        "title"    => $request->input("content.title"),
                        "subtitle" => $request->input("content.subtitle"),
                        "card"     => $cards
                    ]
                ]);

                return response()->json([
                    "status"  => "success",
                    "content" => $pageSection->content
                ]);
            }
     public function TeamMainMembers(Request $request, PageSection $pageSection)
        {
            $content = $pageSection->content ?? [];

            // IMAGE
            $imagePath = $content['image'] ?? null;

            if ($request->hasFile("content.image")) {
                $imagePath = $request->file("content.image")->store("teammember", "public");
            }

            // SOCIAL LINKS
            $links = [];
            if ($request->has("content.links")) {
                foreach ($request->content["links"] as $i => $link) {
                    $links[] = [
                        "iconClassName" => $link["iconClassName"] ?? "",
                        "url"           => $link["url"] ?? "",
                    ];
                }
            }

            $pageSection->update([
                "content" => [
                    "image"       => $imagePath,
                    "name"        => $request->input("content.name"),
                    "position"    => $request->input("content.position"),
                    "description" => $request->input("content.description"),
                    "links"       => $links,
                    'reverse'     => $request->input('content.reverse') == '1',
                ]
            ]);

            return response()->json([
                "status"  => "success",
                "content" => $pageSection->content
            ]);
        }
}
