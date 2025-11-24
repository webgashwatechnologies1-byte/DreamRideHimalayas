<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller {
    public function show($slug)
{
    $page = Page::where('slug', $slug)
                ->with('sections')
                ->firstOrFail();

    return view('frontend.page', [
        'page' => $page,
        'sections' => $page->sections
    ]);
}

}
