<?php 
    use App\Http\Controllers\AuthController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\VehicleController;
    use App\Http\Controllers\TypeController;
    use App\Http\Controllers\ServiceController;
    use App\Http\Controllers\PlaceController;
    use App\Http\Controllers\AmenitiesController;
    use App\Http\Controllers\IncludedController;
    use App\Http\Controllers\PackageController;
    use App\Http\Controllers\GalleryController;
    use App\Http\Controllers\ToursController;
    use App\Http\Controllers\VehiclesCategoryController;
    use App\Http\Controllers\UploadController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\BlogEditorUploadController;
    use App\Http\Controllers\SubscriberController;
    use App\Http\Controllers\Admin\PageSectionController;
    use App\Http\Controllers\Admin\PageController;


    // Enquierys and Bookings 
    use App\Http\Controllers\Api\EnquiryController;
    use App\Http\Controllers\Api\BookingController;
    use App\Http\Controllers\Api\ContactController;
    use App\Http\Controllers\Api\UiComponentController;
    use App\Http\Controllers\Api\FooterSettingController;


// main pages adding and updating routes are here
  Route::post('/admin/pages/sections/{pageSection}', 
    [PageSectionController::class, 'update']
    )->name('admin.pages.updateSection');

    Route::delete('/admin/pages/sections/{pageSection}', 
        [PageSectionController::class, 'destroy']
    )->name('admin.pages.deleteSection');


    // pages starts here
    // Post
      Route::post('/admin/pages/posts/sections/{pageSection}', 
    [PageSectionController::class, 'postsUpdate']
    )->name('admin.pages.updateSection.posts');
// tours
      Route::post('/admin/pages/tours/sections/{pageSection}', 
    [PageSectionController::class, 'toursUpdate']
    )->name('admin.pages.updateSection.tours');
// world
      Route::post('/admin/pages/world/sections/{pageSection}', 
    [PageSectionController::class, 'worldUpdate']
    )->name('admin.pages.updateSection.world');
// testimonialsUpdate
  Route::post('/admin/pages/testimonial/sections/{pageSection}', 
    [PageSectionController::class, 'testimonialsUpdate']
    )->name('admin.pages.updateSection.testimonial');

    // sub hero 
     Route::post('/admin/pages/subhero/sections/{pageSection}', 
    [PageSectionController::class, 'subHeroUpdate']
    )->name('admin.pages.updateSection.subhero');
// stats
    Route::post('/admin/pages/stats/sections/{pageSection}', 
        [PageSectionController::class, 'statsUpdate']
        )->name('admin.pages.updateSection.stats');
// terms
        Route::post('/admin/pages/terms/sections/{pageSection}',
            [PageSectionController::class, 'termsConditionssUpdate']
        )->name('admin.pages.updateSection.terms');

        // Hero 
        Route::post('/admin/pages/herobanner/sections/{pageSection}',
            [PageSectionController::class, 'heroBannerUpdate']
        )->name('admin.pages.updateSection.herobanner');

        // subhero2
        Route::post('/admin/pages/subhero2/sections/{pageSection}',
            [PageSectionController::class, 'subhero2Update']
        )->name('admin.pages.updateSection.subhero2');

        //Back Banner
          Route::post('/admin/pages/backbanner/sections/{pageSection}', 
        [PageSectionController::class, 'backbannerUpdate']
        )->name('admin.pages.updateSection.backbanner');

    // featured tour
    Route::post('/admin/pages/featuredtour/sections/{pageSection}', 
        [PageSectionController::class, 'featuredTourUpdate']
    )->name('admin.pages.updateSection.featuredtour');
    // Activities
    Route::post('/admin/pages/activities/sections/{pageSection}',
        [PageSectionController::class, 'activitiesUpdate']
    )->name('admin.pages.updateSection.activities');

    // offerbannerupdate
    Route::post('/admin/pages/offbanner/sections/{pageSection}', 
    [PageSectionController::class, 'offbannerUpdate'])->name('admin.pages.updateSection.offbanner');
    // Banner blog
    Route::post('/admin/pages/bannerblog/sections/{pageSection}',
    [PageSectionController::class, 'bannerBlogUpdate']
    )->name('admin.pages.updateSection.bannerblog');
    //counter banner
    Route::post('/admin/pages/counterbanner/sections/{pageSection}', 
        [PageSectionController::class, 'counterBannerUpdate']
    )->name('admin.pages.updateSection.counterbanner');

    // Adventure Banner
    Route::post('/admin/pages/adventuresbanner/sections/{pageSection}', 
        [PageSectionController::class, 'adventuresUpdate']
    )->name('admin.pages.updateSection.adventuresbanner');
    // blog banner
    Route::post('/admin/pages/blogbanner/sections/{pageSection}', 
        [PageSectionController::class, 'blogBannerUpdate'])->name('admin.pages.updateSection.blogbanner');
    // contactbanner
    Route::post('/admin/pages/contactbanner/sections/{pageSection}',  [PageSectionController::class, 'contactBannerUpdate']
    )->name('admin.pages.updateSection.contactbanner');
    // Team Section
    Route::post('/admin/pages/team/sections/{pageSection}',  [PageSectionController::class, 'TeamSection']
        )->name('admin.pages.updateSection.team');
    Route::post('/admin/pages/teammainmembers/sections/{pageSection}',  [PageSectionController::class, 'TeamMainMembers']
            )->name('admin.pages.updateSection.teammainmembers');

    // ViewTOur
    // e.g. in routes/api.php or web.php (if you use web middleware)
    Route::post('/admin/pages/viewtour/sections/{pageSection}', [PageSectionController::class,'viewTourUpdate']
    )->name('admin.pages.updateSection.viewtour');


        // order index updating feature 
        Route::post('/admin/pages/{page}/update-order', [PageController::class, 'updateSectionOrder'])->name('admin.pages.updateOrder');
        Route::get('/admin/pages/latest',[PageController::class,"latest"]);

    // frequently used routes are below
    Route::get('/footer', [FooterSettingController::class, 'show']);
    Route::put('/footer', [FooterSettingController::class, 'update']); // protected by auth in admin use middleware
    Route::post('/footer/upload-image', [FooterSettingController::class, 'uploadImage']);
    Route::delete('/footer/gallery/{index}', [FooterSettingController::class, 'deleteGalleryImage']);
  
    Route::apiResource('enquiries', EnquiryController::class);
    Route::apiResource('bookings', BookingController::class);    
    // User auth
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/auth-token', [AuthController::class, 'check']);
    Route::apiResource('/categories', CategoryController::class);
    Route::get('/get-all-categories', [CategoryController::class,'getAll']);
    Route::apiResource('/blogs', BlogController::class);
    Route::post('/blogs/add-comment', [BlogController::class,"AddComment"]);
    Route::get('/blogs/list/simple', [BlogController::class, 'listIdsAndTitles']);

    Route::get('/ui-components', [UiComponentController::class, 'index']);
    Route::post('/ui-components', [UiComponentController::class, 'store']);
    Route::put('/ui-components/{id}', [UiComponentController::class, 'update']);
    Route::delete('/ui-components/{id}', [UiComponentController::class, 'destroy']);
    Route::get('/ui', [UiComponentController::class, 'grouped']);
    Route::post('/upload-logo', [UiComponentController::class, 'uploadLogo']);

    Route::apiResource('/subscribers', SubscriberController::class)->except(['show']);
    Route::post('/editor/upload-image', [BlogEditorUploadController::class, 'uploadImage']);
    Route::post('/editor/upload-video', [BlogEditorUploadController::class, 'uploadVideo']);
    Route::delete('/editor-delete', [BlogEditorUploadController::class, 'delete']);
    Route::apiResource('/contacts', ContactController::class)->only([
        'index', 'store', 'destroy'
    ]);
    // For Admin Panel Routes to Controll System api and to perform crud operations 
    // Vehicle Route
    // Video Upload in CHunks
    Route::post('/upload/video', [UploadController::class, 'upload']);
    Route::delete('/video/delete', [UploadController::class, 'delete']);
    Route::post('/vehicles/verify', [VehicleController::class, 'verify'])->name('vehicles.verify');
    Route::apiResource('/vehicles', VehicleController::class);
    Route::apiResource('/vehicles', VehicleController::class);
    Route::get('/type/get', [TypeController::class,"getAll"]);
    Route::apiResource('/type', TypeController::class);
    Route::get('/get-service', [ServiceController::class,"getAll"]);
    Route::apiResource('/service', ServiceController::class);
    Route::apiResource('/place', PlaceController::class);
    Route::get('/get-all-place', [PlaceController::class,'getAll']);
    Route::apiResource('/included', IncludedController::class);
    Route::apiResource('/amenities', AmenitiesController::class);
    Route::apiResource('/tours', ToursController::class);
    Route::get('/get-all-tours', [ToursController::class,"getAll"]);
    Route::get('/tours/by-place/{place_id}', [ToursController::class, 'getByPlace']);
    Route::apiResource('/package', PackageController::class);
    Route::get('/packages/filters/{tour_id}', [PackageController::class, 'getFilterByTour']);
    Route::get('/packages/main-filters', [PackageController::class, 'getFilters']);
    Route::get('/packages/by-tour/{tour_id}', [PackageController::class, 'getByTour']);
    Route::get('/packages/get-packages', [PackageController::class, 'getPackages']);
    Route::apiResource('/v_cat', VehiclesCategoryController::class);
    Route::apiResource('/gallery', GalleryController::class)
    ->only(['index', 'store', 'update', 'destroy']);

?>