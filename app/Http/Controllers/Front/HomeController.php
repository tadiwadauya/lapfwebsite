<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeIntro;
use App\Models\NewsPost;

class HomeController extends Controller
{
    public function index()
    {
        $intro = HomeIntro::where('is_active', true)->first();

        $news = NewsPost::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('front.home', compact('intro', 'news'));
    }

    public function history()
    {
        return view('front.history'); // resources/views/front/history.blade.php
    }

    public function identity()
    {
        return view('front.identity'); // resources/views/front/history.blade.php
    }
}
