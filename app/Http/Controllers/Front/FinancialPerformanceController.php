<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\FinancialPerformancePage;
use Illuminate\Support\Facades\Storage;


class FinancialPerformanceController extends Controller
{
    public function index()
    {
        $page = FinancialPerformancePage::where('is_active', true)->firstOrFail();
        return view('front.financial_performance.index', compact('page'));
    }

    public function viewPdf()
    {
        $page = FinancialPerformancePage::where('is_active', true)->firstOrFail();

        abort_unless($page->pdf_file && Storage::disk('public')->exists($page->pdf_file), 404);

        // Open in browser (inline)
        return response()->file(storage_path('app/public/' . $page->pdf_file));
    }

   

    public function downloadPdf()
    {
        $page = FinancialPerformancePage::where('is_active', true)->firstOrFail();
    
        abort_unless($page->pdf_file && Storage::disk('public')->exists($page->pdf_file), 404);
    
        return Storage::disk('public')->download($page->pdf_file, 'Financial-Performance.pdf');
    }
    
    
}
