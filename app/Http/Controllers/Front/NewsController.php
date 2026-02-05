<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;

class NewsController extends Controller
{
    public function show(string $slug)
    {
        $post = NewsPost::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('front.news.show', compact('post'));
    }
}
