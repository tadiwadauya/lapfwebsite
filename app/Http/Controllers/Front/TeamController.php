<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $team = TeamMember::where('is_active', true)
            ->orderBy('display_order')
            ->orderByDesc('id')
            ->get();

        return view('front.team.index', compact('team'));
    }
}
