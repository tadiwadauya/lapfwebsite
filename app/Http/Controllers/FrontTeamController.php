<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class FrontTeamController extends Controller
{
    public function index()
    {
        $team = TeamMember::where('is_active', true)
            ->orderBy('display_order')
            ->get();

        return view('front.team', compact('team'));
    }
}
