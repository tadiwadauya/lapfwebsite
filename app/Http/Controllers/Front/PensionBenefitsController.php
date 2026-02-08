<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PensionBenefitPage;

class PensionBenefitsController extends Controller
{
    public function index()
    {
        $page = PensionBenefitPage::where('is_active', true)->firstOrFail();
        return view('front.pension_benefits.index', compact('page'));
    }
}
