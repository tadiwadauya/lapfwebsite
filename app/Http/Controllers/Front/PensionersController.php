<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PensionerImage;

class PensionersController extends Controller
{
    public function index()
    {
        $images = PensionerImage::where('is_active', true)
            ->orderBy('display_order')
            ->orderByDesc('id')
            ->get();

        return view('front.pensioners.index', compact('images'));
    }
}
