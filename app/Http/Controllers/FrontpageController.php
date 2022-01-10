<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    

    public function index() {

        $time = now('UTC')->subDays(14);
        return view('welcome', [
            'time' => $time,
            'featured' => News::featured()->get(),
            'news' => News::latest()->simplePaginate(8)
        ]);
    }

}
