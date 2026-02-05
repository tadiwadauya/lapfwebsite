<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'page_title','breadcrumb_title',
        'chat_title','chat_subtitle','chat_button_text','chat_button_url',
        'phone_title','phone_number','phone_link','phone_button_text',
        'email_title','email_address','email_button_text',
        'address_title','office_address','directions_url','directions_button_text',
        'form_title','form_subtitle',
        'map_iframe_src',
        'footer_about','facebook_url','twitter_url','instagram_url','linkedin_url',
        'footer_phone','footer_email','working_time',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
