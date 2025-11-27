<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Models\Services;
use App\Models\Included;
use App\Models\Amenities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Places;
use App\Models\Type;

class PackageController extends Controller
{
    // Get package via api pagination
    public function index(Request $request)
            {
                $query = Packages::query();

                /* ---------------------------------------------------
                DESTINATION → FILTER BY place_id
                ----------------------------------------------------*/
                if ($request->destination) {

                    $place = Places::where('name', $request->destination)->first();

                    if ($place) {
                        $query->where('place_id', $place->id);
                    }
                }

                /* ---------------------------------------------------
                TYPE → Front sends NAME but DB stores ID
                ----------------------------------------------------*/
                if ($request->type) {

                    $type = Type::where('name', $request->type)->first();

                    if ($type) {
                        $query->where('information->type', $type->id);
                    }
                }

                /* ---------------------------------------------------
                DURATION → tour.length >= requested days
                ----------------------------------------------------*/
                if ($request->duration) {
                    $minDays = (int) $request->duration;
                    $query->whereRaw('JSON_LENGTH(tour) >= ?', [$minDays]);
                }

                /* ---------------------------------------------------
                RIDERS FILTER (SPECIAL LOGIC)
                ----------------------------------------------------*/
                if ($request->riders) {

                    $minRiders = (int) $request->riders;

                    // example: solo=1, duo=2, 5, 10, 15, 20
                    if ($minRiders > 0) {
                        $query->whereRaw("CAST(JSON_EXTRACT(information, '$.noofriders') AS UNSIGNED) >= ?", [$minRiders])
                            ->orderByRaw("CAST(JSON_EXTRACT(information, '$.noofriders') AS UNSIGNED) ASC");
                    }
                }

                /* ---------------------------------------------------
                PRICE RANGE
                ----------------------------------------------------*/
                if ($request->has('min_price') && $request->has('max_price')) {
                    $query->whereBetween('pricing', [
                        (int)$request->min_price,
                        (int)$request->max_price
                    ]);
                }

                /* ---------------------------------------------------
                PAGINATION
                ----------------------------------------------------*/
                $packages = $query->paginate(6);

                /* ---------------------------------------------------
                MAP RESPONSE (AS YOUR FRONTEND USES)
                ----------------------------------------------------*/
                $data = $packages->map(function ($package) {

                    $info = $package->information ?? [];
                    $tour = $package->tour ?? [];

                    $days = is_array($tour) ? count($tour) : 0;
                    $nights = $days > 1 ? $days - 1 : 0;

                    $imageCount = !empty($info['images']) ? count($info['images']) : 0;
                    $videoCount = !empty($info['video']) ? 1 : 0;

                    // TYPE
                    $typeObj = null;
                    if (!empty($info['type'])) {
                        $type = Type::find($info['type']);
                        if ($type) {
                            $typeObj = [
                                "id"    => $type->id,
                                "name"  => $type->name,
                                "color" => $type->color,
                            ];
                        }
                    }

                    return [
                        "id"          => $package->id,
                        "information" => $info,
                        "pricing"     => $package->pricing,
                        "type"        => $typeObj,
                        "days"        => $days,
                        "nights"      => $nights,
                        "image_count" => $imageCount,
                        "video_count" => $videoCount,
                    ];
                });

                return response()->json([
                    "data"         => $data,
                    "current_page" => $packages->currentPage(),
                    "last_page"    => $packages->lastPage(),
                    "total"        => $packages->total()
                ]);
            }




        // get bu tour id 
        public function getByTour(Request $request, $tour_id)
            {
                $query = Packages::where('tour_id', $tour_id);

                /* ----------------------- FILTERS ----------------------- */

                /* ---------------------------------------------------
                DESTINATION → FILTER BY place_id
                ----------------------------------------------------*/
                if ($request->destination) {

                    $place = Places::where('name', $request->destination)->first();

                    if ($place) {
                        $query->where('place_id', $place->id);
                    }
                }

                /* ---------------------------------------------------
                TYPE → Front sends NAME but DB stores ID
                ----------------------------------------------------*/
                if ($request->type) {

                    $type = Type::where('name', $request->type)->first();

                    if ($type) {
                        $query->where('information->type', $type->id);
                    }
                }

                /* ---------------------------------------------------
                DURATION → tour.length >= requested days
                ----------------------------------------------------*/
                if ($request->duration) {
                    $minDays = (int) $request->duration;
                    $query->whereRaw('JSON_LENGTH(tour) >= ?', [$minDays]);
                }

                /* ---------------------------------------------------
                RIDERS → special logic same as index()
                ----------------------------------------------------*/
                if ($request->riders) {

                    $minRiders = (int) $request->riders;

                    if ($minRiders > 0) {
                        $query->whereRaw("CAST(JSON_EXTRACT(information, '$.noofriders') AS UNSIGNED) >= ?", [$minRiders])
                            ->orderByRaw("CAST(JSON_EXTRACT(information, '$.noofriders') AS UNSIGNED) ASC");
                    }
                }

                    /* ---------------------------------------------------
                    PRICE RANGE
                    ----------------------------------------------------*/
                    if ($request->has('min_price') && $request->has('max_price')) {
                        $query->whereBetween('pricing', [
                            (int) $request->min_price,
                            (int) $request->max_price
                        ]);
                    }


                /* ----------------------- PAGINATION ----------------------- */
                $packages = $query->paginate(6);

                /* ----------------------- MAP EACH PACKAGE ----------------------- */
                $data = $packages->map(function ($package) {

                    $info = $package->information ?? [];
                    $tour = $package->tour ?? [];

                    $days = is_array($tour) ? count($tour) : 0;
                    $nights = $days > 1 ? $days - 1 : 0;

                    $imageCount = isset($info['images']) ? count($info['images']) : 0;
                    $videoCount = isset($info['video']) && $info['video'] ? 1 : 0;

                    // Fetch type object
                    $typeObj = null;
                    if (!empty($info['type'])) {
                        $type = Type::find($info['type']);
                        if ($type) {
                            $typeObj = [
                                "id" => $type->id,
                                "name" => $type->name,
                                "color" => $type->color,
                            ];
                        }
                    }

                    return [
                        "id"          => $package->id,
                        "information" => $info,
                        "pricing"     => $package->pricing,
                        "type"        => $typeObj,
                        "days"        => $days,
                        "nights"      => $nights,
                        "image_count" => $imageCount,
                        "video_count" => $videoCount,
                    ];
                });

                return response()->json([
                    "data"         => $data,
                    "current_page" => $packages->currentPage(),
                    "last_page"    => $packages->lastPage(),
                    "total"        => $packages->total()
                ]);
            }

// get flter for package for a particular tour
    public function getFilterByTour($tour_id)
        {
            // 1. Fetch ALL packages for this tour_id
            $packages = Packages::where('tour_id', $tour_id)->get();

            $destinations = [];
            $durations = [];
            $riders = [];
            $prices = [];

            foreach ($packages as $pkg) {

                $info = $pkg->information ?? [];
                $tour = $pkg->tour ?? [];

                // DESTINATION (from tour[].location)
                if (is_array($tour)) {
                    foreach ($tour as $point) {
                        if (!empty($point['location'])) {
                            $destinations[] = $point['location'];
                        }
                    }
                }

                // TRIP DURATION (days count)
                $dur = is_array($tour) ? count($tour) : 0;
                if ($dur > 0) $durations[] = $dur;

                // NO OF RIDERS
                if (!empty($info['noofriders'])) {
                    $riders[] = (int)$info['noofriders'];
                }

                // PRICES
                if (!empty($pkg->pricing)) {
                    $prices[] = (int)$pkg->pricing;
                }
            }

            // REMOVE DUPLICATES + SORT
            $destinations = array_values(array_unique($destinations));
            sort($destinations, SORT_NATURAL);

            $durations = array_values(array_unique($durations));
            sort($durations);

            $riders = array_values(array_unique($riders));
            sort($riders);

            $minPrice = !empty($prices) ? min($prices) : 0;
            $maxPrice = !empty($prices) ? max($prices) : 0;

            return response()->json([
                "destinations" => $destinations,
                "durations"    => $durations,
                "riders"       => $riders,
                "price_range"  => [
                    "min" => $minPrice,
                    "max" => $maxPrice
                ]
            ]);
        }



    // get flter for package for all 
    public function getFilters()
        {
            $packages = Packages::all();
            // FIXED RIDER OPTIONS
            $riderOptions = [
                ["value" => 1,  "label" => "Solo Rider"],
                ["value" => 2,  "label" => "Duo"],
                ["value" => 5,  "label" => "Group 5+"],
                ["value" => 10, "label" => "Group 10+"],
                ["value" => 15, "label" => "Group 15+"],
                ["value" => 20, "label" => "Group 20+"],
            ];

            $destinations = [];
            $durations = [];
            $riders = [];
            $prices = [];
            // FIXED DURATIONS LIST
            $durationOptions = [];

            for ($i = 1; $i <= 20; $i++) {
                $durationOptions[] = [
                    "value" => $i,
                    "label" => $i . " Day" . ($i > 1 ? "s" : "")
                ];
            }

            // LAST OPTION → More Than 20 Days
            $durationOptions[] = [
                "value" => 21,
                "label" => "More Than 20 Days"
            ];

            /** ============ NEW PART ============ */
            // Fetch ALL Types
            $allTypes = Type::select('id', 'name')->get();

            // Fetch ALL Places for destination filter
            $allPlaces = Places::select('id', 'name')->get();
            /** ================================= */

            foreach ($packages as $pkg) {

                $info = $pkg->information ?? [];
                $tour = $pkg->tour ?? [];

                // DESTINATIONS (from tour field)
                if (is_array($tour)) {
                    foreach ($tour as $point) {
                        if (!empty($point['location'])) {
                            $destinations[] = $point['location'];
                        }
                    }
                }

                // TRIP DURATION (KEEPING EXACTLY AS YOU SAID)
                $dur = is_array($tour) ? count($tour) : 0;
                if ($dur > 0) {
                    $durations[] = $dur;
                }

                // NO OF RIDERS
                if (!empty($info['noofriders'])) {
                    $riders[] = (int)$info['noofriders'];
                }

                // PRICES
                if (!empty($pkg->pricing)) {
                    $prices[] = (int)$pkg->pricing;
                }
            }

            // UNIQUE + SORT
            $destinations = array_values(array_unique($destinations));
            sort($destinations, SORT_NATURAL);

            $durations = array_values(array_unique($durations));
            sort($durations);

            $riders = array_values(array_unique($riders));
            sort($riders);

            /** Riders — convert to labels */
            $riderOptions = [];
            foreach ($riders as $r) {
                $riderOptions[] = [
                    "value" => $r,
                    "label" => $r . "+ Group"
                ];
            }

            /** Price range */
            $minPrice = !empty($prices) ? min($prices) : 0;
            $maxPrice = !empty($prices) ? max($prices) : 0;

            return response()->json([
                "destinations" => $allPlaces,   // <-- NOW RETURN ALL PLACES
               "durations" => $durationOptions, // <-- SAME AS BEFORE
                "riders"       => [
                    ["value" => 1,  "label" => "Solo"],
                    ["value" => 2,  "label" => "Duo"],
                    ["value" => 5,  "label" => "Group 5+"],
                    ["value" => 10, "label" => "Group 10+"],
                    ["value" => 15, "label" => "Group 15+"],
                    ["value" => 20, "label" => "Group 20+"],
                ],
                "price_range"  => [
                    "min" => $minPrice,
                    "max" => $maxPrice
                ],
                "types"        => $allTypes    // <-- NOW RETURN FULL TYPES LIST
            ]);
        }



    // POST /packages
    public function store(Request $request)
                {
                    // Validate top-level structure
                    $validated = $request->validate([
                        'information' => 'required',
                        'tour' => 'nullable',
                        'availablevehicles' => 'nullable',
                        'locationshare' => 'nullable',
                        'feature' => 'nullable',
                        'services' => 'nullable',
                        'pricing' => 'required|integer',
                        'tour_id' => 'required|exists:tours,id',
                        'place_id' => 'required|exists:places,id',
                    ]);

                    // Decode JSON if it comes as string (since FormData sends strings)
                    $information = json_decode($request->input('information'), true);
                    $locationshare = json_decode($request->input('locationshare'), true);
                    $tour = json_decode($request->input('tour', '[]'), true);
                    $availablevehicles = json_decode($request->input('availablevehicles', '[]'), true);
                    $feature = json_decode($request->input('feature', '[]'), true);
                    $services = json_decode($request->input('services', '[]'), true);


                            // IMAGE 
                        $imagePaths = [];
                    if ($request->hasFile('images')) {
                        foreach ($request->file('images') as $index => $image) {
                            // Store on 'public' disk → saves to storage/app/public/packages/images
                            $path = $image->store('packages/images', 'public');

                            $imagePaths[] = [
                                'url' => 'storage/' . $path, // Browser-accessible URL
                                'is_main' => $request->input("images_meta.$index.is_main") ?? false,
                            ];
                        }
                    }

                    // ==============================
                    // HANDLE SHOT GALLERY UPLOADS
                    // ==============================
                    $shotGallery = [];
                    if ($request->hasFile('shotgallery')) {
                        foreach ($request->file('shotgallery') as $index => $image) {
                            $path = $image->store('packages/shotgallery', 'public');

                            $shotGallery[] = [
                                'url' => 'storage/' . $path,
                                'is_main' => false, // default; can be updated later
                            ];
                        }
                    }



                    // Merge media data into "information" JSON
                    $information['images'] = $imagePaths;
                    $information['shot_gallery'] = $shotGallery;


                            // Save everything as JSON structure
                            $package = Packages::create([
                                'information' => $information,
                                'tour' => $tour,
                                'availablevehicles' => $availablevehicles,
                                'locationshare' => $locationshare,
                                'feature' => $feature,
                                'services' => $services,
                                'pricing' => $validated['pricing'],
                                'tour_id' => $validated['tour_id'],
                                'place_id' => $validated['place_id'],
                                
                            ]);

                            return response()->json([
                                'message' => 'Package created successfully',
                                'package' => $package,
                            ], 201);
        }

   // GET /packages/{id}
public function show($id)
{
    $package = Packages::findOrFail($id);

    $info = $package->information ?? [];

    // ---- INCLUDED ----
    $includedIds = $info['included'] ?? [];
    $included = [];
    if (!empty($includedIds)) {
        $included = \App\Models\Included::whereIn('id', $includedIds)->get();
    }

    // ---- AMENITIES ----
    $amenitiesIds = $info['amenities'] ?? [];
    $amenities = [];
    if (!empty($amenitiesIds)) {
        $amenities = \App\Models\Amenities::whereIn('id', $amenitiesIds)->get();
    }

    // ---- SERVICES ---- (if you want them)
    $serviceIds = $package->services ?? [];
    $services = [];
    if (!empty($serviceIds)) {
        $services = \App\Models\Services::whereIn('id', $serviceIds)->get();
    }

    return response()->json([
        "id" => $package->id,
        "information" => $package->information,
        "tour" => $package->tour,
        "locationshare" => $package->locationshare,
        "feature" => $package->feature,
        "reviews" => $package->reviews,
        "gallery" => $package->gallery,
        "place_id" => $package->place_id,
        "pricing" => $package->pricing,
        "tour_id" => $package->tour_id,
        "created_at" => $package->created_at,
        "updated_at" => $package->updated_at,

        // NEW FULL DATA  
        "included_details" => $included,
        "amenities_details" => $amenities,
        "services_details" => $services,
    ]);
}


    // PUT/PATCH /packages/{id}
     public function update(Request $request, $id)
            {
                $package = Packages::findOrFail($id);
                function cleanUrl($url) {
                    return preg_replace('/^https?:\/\/[^\/]+\//', '', $url);
                }

                // -------------------------
                // VALIDATION
                // -------------------------
                $validated = $request->validate([
                    'information'   => 'required',
                    'tour'          => 'nullable',
                    'locationshare' => 'nullable',
                    'services'      => 'nullable',
                    'pricing'       => 'required|integer',
                    'tour_id'       => 'required|exists:tours,id',
                    'place_id'      => 'required|exists:places,id',
                ]);

                // Decode JSON
                $information    = json_decode($request->information, true);
                $tour           = json_decode($request->tour ?? '[]', true);
                $locationshare  = json_decode($request->locationshare ?? '[]', true);
                $services       = json_decode($request->services ?? '[]', true);

                // ===============================================================
                //   PACKAGE IMAGES MERGE: existing_images + new_images
                // ===============================================================

                $finalImages = [];

                // 1️⃣ Existing images (keep them exactly as passed)
               $existing = $request->input('existing_images', []);
                foreach ($existing as $img) {
                    $finalImages[] = [
                        "url"     => cleanUrl($img["url"]),
                        "is_main" => $img["is_main"] ?? false,
                    ];
                }


                // 2️⃣ Upload new images
                if ($request->hasFile('new_images')) {
                    foreach ($request->file('new_images') as $file) {
                        $path = $file->store("packages/images", "public");
                        $finalImages[] = [
                            "url"     => "storage/" . $path,
                            "is_main" => false, // default
                        ];
                    }
                }

                // 3️⃣ Apply main_index
                $mainIndex = intval($request->main_index ?? 0);
                foreach ($finalImages as $i => $img) {
                    $finalImages[$i]['is_main'] = ($i === $mainIndex);
                }


                // ===============================================================
                //   SHOT GALLERY MERGE: existing_gallery + new_gallery
                // ===============================================================
                $finalGallery = [];

                // Existing
               $existingGallery = $request->input("existing_gallery", []);
                foreach ($existingGallery as $url) {
                    $finalGallery[] = [
                        "url"     => cleanUrl($url),
                        "is_main" => false
                    ];
                }


                // New
                if ($request->hasFile("new_gallery")) {
                    foreach ($request->file("new_gallery") as $file) {
                        $path = $file->store("packages/shotgallery", "public");
                        $finalGallery[] = [
                            "url"     => "storage/" . $path,
                            "is_main" => false
                        ];
                    }
                }


                // ===============================================================
                //   VIDEO (Resumable upload path already sent as string)
                // ===============================================================
                $videoPath = $information['video'] ?? null;


                // ===============================================================
                //   FINAL MERGE INTO INFORMATION JSON
                // ===============================================================
                $information["images"]       = $finalImages;
                $information["shot_gallery"] = $finalGallery;
                $information["video"]        = $videoPath;


                // ===============================================================
                //   UPDATE PACKAGE
                // ===============================================================
                $package->update([
                    'information'    => $information,
                    'tour'           => $tour,
                    'locationshare'  => $locationshare,
                    'services'       => $services,
                    'pricing'        => $validated['pricing'],
                    'tour_id'        => $validated["tour_id"],
                    'place_id'       => $validated["place_id"],
                ]);

                return response()->json([
                    "message" => "Package updated successfully",
                    "package" => $package
                ]);
            }



    // DELETE /packages/{id}
    public function destroy($id)
    {
        Packages::destroy($id);
        return response()->json(['message' => 'Package deleted successfully']);
    }

    public function getPackages()
    {
        $packages = Packages::all();
            $data = $packages->map(function ($package) {

            $title = $package->information['title'] ?? "";
            return [
                "id"          => $package->id,
                "title" => $title,
                "date" => $package -> created_at,
            ];
        });

        return response()->json([
        "data"         => $data,

    ]);
    }
}
