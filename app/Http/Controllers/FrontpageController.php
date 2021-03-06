<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    

    public function index() {

        return view('welcome', [
            'featured' => News::featured()->get(),
            'news' => News::latest()->simplePaginate(8)
        ]);
    }

}
