<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\MembershipCyclePage;

class MembershipCycleController extends Controller
{
    public function index()
    {
        $page = MembershipCyclePage::where('is_active', true)->firstOrFail();
        return view('front.membership_cycle.index', compact('page'));
    }
}
