<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactCmsController extends Controller
{
    public function edit()
    {
        $settings = ContactSetting::first();

        if (!$settings) {
            $settings = ContactSetting::create([
                'page_title' => 'Contact',
                'breadcrumb_title' => 'Contact',
                'is_active' => true,
            ]);
        }

        return view('user.contact-settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = ContactSetting::firstOrFail();

        $data = $request->validate([
            'page_title' => ['required','string','max:255'],
            'breadcrumb_title' => ['required','string','max:255'],

            'chat_title' => ['required','string','max:255'],
            'chat_subtitle' => ['nullable','string','max:255'],
            'chat_button_text' => ['nullable','string','max:255'],
            'chat_button_url' => ['nullable','string','max:255'],

            'phone_title' => ['required','string','max:255'],
            'phone_number' => ['nullable','string','max:255'],
            'phone_link' => ['nullable','string','max:255'],
            'phone_button_text' => ['nullable','string','max:255'],

            'email_title' => ['required','string','max:255'],
            'email_address' => ['nullable','string','max:255'],
            'email_button_text' => ['nullable','string','max:255'],

            'address_title' => ['required','string','max:255'],
            'office_address' => ['nullable','string','max:255'],
            'directions_url' => ['nullable','string','max:255'],
            'directions_button_text' => ['nullable','string','max:255'],

            'form_title' => ['required','string','max:255'],
            'form_subtitle' => ['nullable','string','max:255'],

            // store ONLY the src value of iframe
            'map_iframe_src' => ['nullable','string'],

            'footer_about' => ['nullable','string','max:1000'],
            'facebook_url' => ['nullable','string','max:255'],
            'twitter_url' => ['nullable','string','max:255'],
            'instagram_url' => ['nullable','string','max:255'],
            'linkedin_url' => ['nullable','string','max:255'],

            'footer_phone' => ['nullable','string','max:255'],
            'footer_email' => ['nullable','email','max:255'],
            'working_time' => ['nullable','string','max:255'],

            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $settings->update($data);

        return back()->with('success', 'Contact page settings updated.');
    }

    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(15);
        return view('user.contact-messages.index', compact('messages'));
    }

    public function showMessage(ContactMessage $contactMessage)
    {
        return view('user.contact-messages.show', compact('contactMessage'));
    }

    public function deleteMessage(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('user.contact-messages.index')->with('success', 'Message deleted.');
    }
}
