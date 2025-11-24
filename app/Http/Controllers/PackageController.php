<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Models\Services;
use App\Models\Included;
use App\Models\Amenities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Type;

class PackageController extends Controller
{
    // Get package via api pagination
public function index(Request $request)
{
    $query = Packages::query();

    /* ----------------------- FILTERS ----------------------- */

    // Destination (tour[].location)
    if ($request->destination) {
        $query->whereJsonContains('tour', [['location' => $request->destination]]);
    }

    // Duration (count tour.length)
    if ($request->duration) {
        $query->whereRaw('JSON_LENGTH(tour) = ?', [$request->duration]);
    }

    // Riders
    if ($request->riders) {
        $query->where('information->noofriders', $request->riders);
    }

    // Price Range
   if ($request->has('min_price') && $request->has('max_price')) {
    $query->whereBetween('pricing', [
        (int)$request->min_price,
        (int)$request->max_price
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



// get bu tour id 
public function getByTour(Request $request, $tour_id)
{
    $query = Packages::where('tour_id', $tour_id);

    /* ----------------------- FILTERS ----------------------- */

    // Destination (tour[].location)
    if ($request->destination) {
        $query->whereJsonContains('tour', [['location' => $request->destination]]);
    }

    // Duration (count tour.length)
    if ($request->duration) {
        $query->whereRaw('JSON_LENGTH(tour) = ?', [$request->duration]);
    }

    // Riders
    if ($request->riders) {
        $query->where('information->noofriders', $request->riders);
    }

    // Price Range
   if ($request->has('min_price') && $request->has('max_price')) {
    $query->whereBetween('pricing', [
        (int)$request->min_price,
        (int)$request->max_price
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

    $destinations = [];
    $durations = [];
    $riders = [];
    $prices = [];
    $types = [];

    foreach ($packages as $pkg) {

        $info = $pkg->information ?? [];
        $tour = $pkg->tour ?? [];

        // DESTINATIONS
        if (is_array($tour)) {
            foreach ($tour as $point) {
                if (!empty($point['location'])) {
                    $destinations[] = $point['location'];
                }
            }
        }

        // TRIP DURATION
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

        // TYPE → fetch type.name
     if (!empty($pkg->information) && !empty($pkg->information['type'])) {
        $typeId = (int)$pkg->information['type'];

            $typeName = Type::where('id', $typeId)->value('name');

            if ($typeName) {
                $types[] = $typeName;
            }
        }
    }

    // UNIQUE + SORT
    $destinations = array_values(array_unique($destinations));
    sort($destinations, SORT_NATURAL);

    $durations = array_values(array_unique($durations));
    sort($durations);

    $riders = array_values(array_unique($riders));
    sort($riders);

    $types = array_values(array_unique($types));
    sort($types, SORT_NATURAL);

    $minPrice = !empty($prices) ? min($prices) : 0;
    $maxPrice = !empty($prices) ? max($prices) : 0;

    return response()->json([
        "destinations" => $destinations,
        "durations"    => $durations,
        "riders"       => $riders,
        "price_range"  => [
            "min" => $minPrice,
            "max" => $maxPrice
        ],
        "types" => $types
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

            // -------------------------
            // VALIDATION
            // -------------------------
            $validated = $request->validate([
                'information'   => 'required',
                'tour'          => 'nullable',
                'locationshare' => 'nullable',
                'feature'       => 'nullable',
                'services'      => 'nullable',
                'pricing'       => 'required|integer',
                'tour_id'       => 'required|exists:tours,id',
                'place_id'      => 'required|exists:places,id',

                'images.*'      => 'sometimes|file|image|max:5120',
                'shotgallery.*' => 'sometimes|file|image|max:5120',
                'video'         => 'sometimes|file|mimetypes:video/mp4,video/quicktime|max:51200',

                'images_meta'   => 'nullable',
            ]);

            // decode JSON strings from FormData
            $information    = json_decode($request->input('information'), true);
            $tour           = json_decode($request->input('tour', '[]'), true);
            $locationshare  = json_decode($request->input('locationshare', '[]'), true);
            $feature        = json_decode($request->input('feature', '[]'), true);
            $services       = json_decode($request->input('services', '[]'), true);
            $imagesMeta     = json_decode($request->input('images_meta', '[]'), true);

            // =====================================================================
            // DELETE OLD MEDIA ONLY IF NEW MEDIA IS PROVIDED
            // =====================================================================

            /* ----------------------------
            DELETE OLD IMAGES (if new uploaded)
            ----------------------------- */
            $oldImages = $package->information['images'] ?? [];
            if ($request->hasFile('images')) {
                foreach ($oldImages as $old) {
                    if (!empty($old['url'])) {
                        $path = str_replace('storage/', '', $old['url']);
                        Storage::disk('public')->delete($path);
                    }
                }
            }

            /* ----------------------------
            DELETE OLD SHOT GALLERY (if new uploaded)
            ----------------------------- */
            $oldShots = $package->information['shot_gallery'] ?? [];
            if ($request->hasFile('shotgallery')) {
                foreach ($oldShots as $old) {
                    if (!empty($old['url'])) {
                        $path = str_replace('storage/', '', $old['url']);
                        Storage::disk('public')->delete($path);
                    }
                }
            }

            /* ----------------------------
            DELETE OLD VIDEO (if new uploaded)
            ----------------------------- */
            $oldVideo = $package->information['video'] ?? null;
            if ($request->hasFile('video') && $oldVideo) {
                $path = str_replace('storage/', '', $oldVideo);
                Storage::disk('public')->delete($path);
            }

            // =====================================================================
            // SAVE NEW MEDIA
            // =====================================================================

            /* ----------------------------
            SAVE NEW IMAGES
            ----------------------------- */
            $newImages = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $file) {
                    $path = $file->store('packages/images', 'public');
                    $newImages[] = [
                        'url'     => 'storage/' . $path,
                        'is_main' => $imagesMeta[$index]['is_main'] ?? false,
                    ];
                }
            } else {
                // keep old images if not uploaded new ones
                $newImages = $oldImages;
            }

            /* ----------------------------
            SAVE NEW SHOT GALLERY
            ----------------------------- */
            $newShotGallery = [];
            if ($request->hasFile('shotgallery')) {
                foreach ($request->file('shotgallery') as $index => $file) {
                    $path = $file->store('packages/shotgallery', 'public');
                    $newShotGallery[] = [
                        'url'     => 'storage/' . $path,
                        'is_main' => false,
                    ];
                }
            } else {
                $newShotGallery = $oldShots;
            }

            /* ----------------------------
            SAVE NEW VIDEO
            ----------------------------- */
            $newVideoPath = $oldVideo;
            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $path = $file->store('packages/videos', 'public');
                $newVideoPath = 'storage/' . $path;
            }

            // =====================================================================
            // MERGE INTO INFORMATION JSON
            // =====================================================================
            $information['images']        = $newImages;
            $information['shot_gallery']  = $newShotGallery;
            $information['video']         = $newVideoPath;

            // =====================================================================
            // UPDATE THE PACKAGE RECORD
            // =====================================================================
            $package->update([
                'information'    => $information,
                'tour'           => $tour,
                'locationshare'  => $locationshare,
                'feature'        => $feature,
                'services'       => $services,
                'pricing'        => $validated['pricing'],
                'tour_id'        => $validated['tour_id'],
                'place_id'       => $validated['place_id'],
            ]);

            return response()->json([
                'message' => 'Package updated successfully',
                'package' => $package,
            ], 200);
        }


    // DELETE /packages/{id}
    public function destroy($id)
    {
        Packages::destroy($id);
        return response()->json(['message' => 'Package deleted successfully']);
    }

    public function getPackages(){
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
