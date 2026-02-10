<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ActiveMemberImage;

class ActiveMembersController extends Controller
{
    public function index()
    {
        $images = ActiveMemberImage::where('is_active', true)
            ->orderBy('display_order')
            ->orderByDesc('id')
            ->get();

        return view('front.active_members.index', compact('images'));
    }
}
