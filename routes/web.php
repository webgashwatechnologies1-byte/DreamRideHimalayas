<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
use App\Http\Controllers\ToursController;

// for adding pages

// Test Route
   
    Route::prefix('admin')->name('admin.')->group(function () {

    // Pages
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');

    Route::get('/pages/{id}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{id}', [PageController::class, 'update'])->name('pages.update');

    Route::delete('/pages/{id}', [PageController::class, 'destroy'])->name('pages.destroy');

    // Sections / Widgets
    Route::post('/pages/{pageId}/sections', [PageController::class, 'addSection'])
        ->name('pages.addSection');

        // Route::post('/sections/{id}', [PageController::class, 'updateSection'])
        //     ->name('pages.updateSection');
        Route::get('/sections/{id}/render', [PageController::class, 'renderSection'])
        ->name('pages.sectionRender');

    // Route::delete('/sections/{id}', [PageController::class, 'deleteSection'])
    //     ->name('pages.deleteSection');
});
    
Route::get('/all-packages',function(){
    return view('cms.all-packages');
});
//  Explicit routes for Blogs pages
Route::get('/admin/blog/create', function () {
    abort_unless(View::exists('admin.pages.blog.create'), 404);
    return view('admin.pages.blog.create');
})->name('admin.blog.create');


Route::get('/admin/blog/edit/{id}', function ($id) {
    abort_unless(View::exists('admin.pages.blog.edit'), 404);
    return view('admin.pages.blog.edit', compact('id'));
})->where('id', '[0-9]+')->name('admin.blog.edit');
// Home – fixed, but uses controller@show with slug = "home"
Route::get('/', [FrontendPageController::class, 'show'])
    ->defaults('slug', 'home');

// About – fixed, but uses controller@show with slug = "about-us"
Route::get('/about-us', [FrontendPageController::class, 'show'])
    ->defaults('slug', 'about-us');

// Dynamic pages – must be AFTER the fixed routes
Route::get('/{slug}', [FrontendPageController::class, 'show']);
// Login page - let client-side handle redirect if already logged in
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('admin.login');


//  Explicit routes for Vehicle pages
Route::get('/admin/vehicle/create', function () {
    abort_unless(View::exists('admin.pages.vehicle.create'), 404);
    return view('admin.pages.vehicle.create');
})->name('admin.vehicle.create');

Route::get('/admin/vehicle/edit/{id}', function ($id) {
    abort_unless(View::exists('admin.pages.vehicle.edit'), 404);
    return view('admin.pages.vehicle.edit', compact('id'));
})->where('id', '[0-9]+')->name('admin.vehicle.edit');

//  Explicit routes for Type pages
Route::get('/admin/type/create', function () {
    abort_unless(View::exists('admin.pages.type.create'), 404);
    return view('admin.pages.type.create');
})->name('admin.type.create');
Route::get('/admin/type/edit/{id}', function ($id) {
    abort_unless(View::exists('admin.pages.type.edit'), 404);
    return view('admin.pages.type.edit', compact('id'));
})->where('id', '[0-9]+')->name('admin.type.edit');

//  Explicit routes for Services pages
Route::get('/admin/service/create', function () {
    abort_unless(View::exists('admin.pages.services.create'), 404);
    return view('admin.pages.services.create');
})->name('admin.services.create');

Route::get('/admin/service/edit/{id}', function ($id) {
    abort_unless(View::exists('admin.pages.services.edit'), 404);
    return view('admin.pages.services.edit', compact('id'));
})->where('id', '[0-9]+')->name('admin.services.edit');


//  Explicit routes for Tours pages
Route::get('/admin/tours/create', function () {
    abort_unless(View::exists('admin.pages.tours.create'), 404);
    return view('admin.pages.tours.create');
})->name('admin.tours.create');

Route::get('/admin/tours/edit/{id}', function ($id) {
    abort_unless(View::exists('admin.pages.tours.edit'), 404);
    return view('admin.pages.tours.edit', compact('id'));
})->where('id', '[0-9]+')->name('admin.tours.edit');


//  Explicit routes for Categories pages
Route::get('/admin/category/create', function () {
    abort_unless(View::exists('admin.pages.category.create'), 404);
    return view('admin.pages.category.create');
})->name('admin.category.create');

Route::get('/admin/category/edit/{id}', function ($id) {
    abort_unless(View::exists('admin.pages.category.edit'), 404);
    return view('admin.pages.category.edit', compact('id'));
})->where('id', '[0-9]+')->name('admin.category.edit');


Route::get('/tour/{id}', [ToursController::class, 'webShow']);

// ✅ Explicit routes for Package pages
Route::get('/admin/package/create', function () {
    abort_unless(View::exists('admin.pages.package.add-package'), 404);
    return view('admin.pages.package.add-package');
})->name('admin.package.add-package');

Route::get('/admin/package/edit/{id}', function ($id) {
    abort_unless(View::exists('admin.pages.package.edit-package'), 404);
    return view('admin.pages.package.edit-package', compact('id'));
})->where('id', '[0-9]+')->name('admin.package.edit-package');

Route::get('/pages/{page}', function ($page) {
    $page = str_replace('/', '.', $page);
    abort_unless(View::exists("pages.$page"), 404);
    return view("pages.$page");
})->where('page', '[A-Za-z0-9\/\-_]+');

// Dynamic CMS pages: /pages/{page}

// USERs
Route::get('/pages/blog-details/{id}', function () {
    return view('cms.blog-details'); 
});

Route::get('/pages/{page}', function (string $page) {
    
    abort_unless(View::exists("cms.$page"), 404);
    return view("cms.$page");
})->where('page', '[A-Za-z0-9\-]+');

// Nested CMS pages: /pages/{folder}/{page}
Route::get('/pages/{folder}/{page}', function (string $folder, string $page) {
    $view = "cms.$folder.$page";
    abort_unless(View::exists($view), 404);
    return view($view);
})->where(['folder' => '[A-Za-z0-9\-]+', 'page' => '[A-Za-z0-9\-]+']);



// tour package listed routes
Route::get('/pages/tours/{id}/{name?}', function () {
    return view('cms.tours.index'); 
});


// package
Route::get('/packages/{id}', function () {
    return view('cms.packages.index'); 
});


// now for booking and enquires and id

Route::get("/admin/forms/booking", function () {
    return view("admin.pages.forms.booking");
    // return "hello";

});

Route::get("/admin/enquiries", function () {
    return view("admin.pages.forms.enquiries");
});

Route::get('/admin/forms/bookings/{id}', function ($id) {
        return view('admin.pages.forms.booking-show', ['id' => $id]);

});

Route::get('/admin/forms/enquiries/{id}', function ($id) {
    return view('admin.pages.forms.enquiries-show', ['id' => $id]);
});



// ✅ Dynamic fallback routes for all other pages
Route::get('/admin/{page}', function ($page) {
    $page = str_replace('/', '.', $page);
    abort_unless(View::exists("admin.pages.$page"), 404);
    return view("admin.pages.$page");
})->where('page', '[A-Za-z0-9\/\-_]+');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
