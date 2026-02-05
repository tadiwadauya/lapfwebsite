<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = ContactSetting::first();

        if (!$settings) {
            $settings = ContactSetting::create([
                'page_title' => 'Contact',
                'breadcrumb_title' => 'Contact',
                'is_active' => true,
            ]);
        }

        return view('front.contact', compact('settings'));
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','max:255'],
            'phone' => ['nullable','string','max:50'],
            'subject' => ['nullable','string','max:255'],
            'message' => ['nullable','string','max:2000'],
        ]);

        $data['submitted_at'] = now();

        ContactMessage::create($data);

        return back()->with('success', 'Thank you! Your message has been received.');
    }
}
