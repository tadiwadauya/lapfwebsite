<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MembershipCyclePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembershipCyclePageController extends Controller
{
    public function edit()
    {
        $page = MembershipCyclePage::first();

        if (!$page) {
            $page = MembershipCyclePage::create();
        }

        return view('user.membership_cycle.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $page = MembershipCyclePage::firstOrFail();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['nullable'],
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($page->image) {
                Storage::disk('public')->delete($page->image);
            }
            $data['image'] = $request->file('image')->store('membership-cycle', 'public');
        }

        $page->update($data);

        return redirect()
            ->route('user.membership-cycle.edit')
            ->with('success', 'Membership Cycle image updated successfully.');
    }
}
