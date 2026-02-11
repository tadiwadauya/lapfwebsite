<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ComplaintProcedurePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComplaintProcedurePageController extends Controller
{
    public function edit()
    {
        $page = ComplaintProcedurePage::first();

        if (!$page) {
            $page = ComplaintProcedurePage::create();
        }

        return view('user.complaints_procedure.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $page = ComplaintProcedurePage::firstOrFail();

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

            $data['image'] = $request->file('image')->store('complaints-procedure', 'public');
        }

        $page->update($data);

        return redirect()
            ->route('user.complaints-procedure.edit')
            ->with('success', 'Complaints Handling Procedure image updated.');
    }
}
