<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\GovernancePage;
use App\Models\Committee;

class GovernanceController extends Controller
{
    public function index()
    {
        $page = GovernancePage::where('is_active', true)->first();
        $committees = Committee::where('is_active', true)
            ->orderBy('sort_order')->orderBy('id')
            ->with('members')
            ->get();

        return view('front.governance', compact('page','committees'));
    }
}
