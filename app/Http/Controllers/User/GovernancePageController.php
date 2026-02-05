<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\GovernancePage;
use Illuminate\Http\Request;

class GovernancePageController extends Controller
{
    public function edit()
    {
        $page = GovernancePage::first();

        // Ensure always 1 row exists
        if (!$page) {
            $page = GovernancePage::create([
                'title' => 'Governance Structure Overview',
                'overview' => 'Fund is administered by Trustees (Management Committee) with equal representation from local authorities and contributors.',
                'focus_areas' => [
                    'Investment performance',
                    'Benefits',
                    'Communication',
                    'Strategic planning',
                    'Benchmarking to best market practise(s)',
                ],
                'is_active' => true,
            ]);
        }

        return view('user.governance.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $page = GovernancePage::firstOrFail();

        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'overview' => ['nullable','string'],
            'focus_areas' => ['nullable','array'],
            'focus_areas.*' => ['nullable','string','max:255'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        // Clean empty focus lines
        $data['focus_areas'] = collect($request->input('focus_areas', []))
            ->map(fn($x) => trim((string)$x))
            ->filter()
            ->values()
            ->all();

        $page->update($data);

        return back()->with('success', 'Governance overview updated.');
    }
}

