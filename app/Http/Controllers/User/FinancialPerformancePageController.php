<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinancialPerformancePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinancialPerformancePageController extends Controller
{
    public function edit()
    {
        $page = FinancialPerformancePage::first();

        if (!$page) {
            $page = FinancialPerformancePage::create();
        }

        return view('user.financial_performance.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $page = FinancialPerformancePage::firstOrFail();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'pdf_file' => ['nullable', 'mimes:pdf', 'max:20480'], // 20MB
            'is_active' => ['nullable'],
        ]);

        $data['is_active'] = $request->has('is_active');

        // Replace cover image
        if ($request->hasFile('cover_image')) {
            if ($page->cover_image) {
                Storage::disk('public')->delete($page->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('financial-performance', 'public');
        }

        // Replace PDF
        if ($request->hasFile('pdf_file')) {
            if ($page->pdf_file) {
                Storage::disk('public')->delete($page->pdf_file);
            }
            $data['pdf_file'] = $request->file('pdf_file')->store('financial-performance', 'public');
        }

        $page->update($data);

        return redirect()
            ->route('user.financial-performance.edit')
            ->with('success', 'Financial Performance page updated.');
    }
}
