<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function find($slug) {
        $page = Page::where('slug', '=', "/" . $slug)->firstOrFail();
        
        return view('page', $page);
    }
}
