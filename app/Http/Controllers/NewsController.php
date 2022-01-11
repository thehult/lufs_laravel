<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    
    public function list() {
        return view('news-list', [
            'featured' => News::featured()->get(),
            'news' => News::latest()->paginate(15)
        ]);
    }

}
