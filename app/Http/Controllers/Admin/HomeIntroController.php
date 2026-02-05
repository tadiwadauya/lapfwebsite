<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeIntro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeIntroController extends Controller
{
    public function edit()
    {
        $intro = HomeIntro::first();

        // Ensure there is always one row to edit
        if (!$intro) {
            $intro = HomeIntro::create([
                'tagline' => 'Welcome to',
                'title' => 'Local Authorities Pension Fund',
                'body' => 'The Local Authorities Pension Fund (LAPF) was established on 1 July 1950...',
                'is_active' => true,
            ]);
        }

        return view('user.home-intro.edit', compact('intro'));
    }

    public function update(Request $request)
    {
        $intro = HomeIntro::firstOrFail();

        $data = $request->validate([
            'tagline' => ['required', 'string', 'max:255'],
            'title'   => ['required', 'string', 'max:255'],
            'body'    => ['nullable', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            // delete old
            if ($intro->image && Storage::disk('public')->exists($intro->image)) {
                Storage::disk('public')->delete($intro->image);
            }

            $data['image'] = $request->file('image')->store('home', 'public');
        }

        $intro->update($data);

        return back()->with('success', 'Home Intro updated successfully.');
    }
}
