<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ComplaintProcedurePage;

class ComplaintProcedureController extends Controller
{
    public function index()
    {
        $page = ComplaintProcedurePage::where('is_active', true)->firstOrFail();
        return view('front.complaints_procedure.index', compact('page'));
    }
}
