<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\GovernancePage;  // ✅ use it
use App\Models\Committee;
use App\Models\Person;

class GovernanceController extends Controller
{
    public function index()
    {
        $page = GovernancePage::first(); // or ->where('slug','governance')->first()

        $people = Person::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        $committees = Committee::with('members')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('front.governance', compact('page', 'people', 'committees'));
    }
}
