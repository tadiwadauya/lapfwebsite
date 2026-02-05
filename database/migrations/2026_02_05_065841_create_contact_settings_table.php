<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
    
            // Page header
            $table->string('page_title')->default('Contact');
            $table->string('breadcrumb_title')->default('Contact');
    
            // Info cards
            $table->string('chat_title')->default('Live Chat');
            $table->string('chat_subtitle')->default('Available 24/7');
            $table->string('chat_button_text')->default("Let’s Chat");
            $table->string('chat_button_url')->nullable();
    
            $table->string('phone_title')->default('Call Us');
            $table->string('phone_number')->nullable(); // display text
            $table->string('phone_link')->nullable();   // tel:+...
            $table->string('phone_button_text')->default('Call Us');
    
            $table->string('email_title')->default('Mail Us');
            $table->string('email_address')->nullable();
            $table->string('email_button_text')->default('Drop Us A Line');
    
            $table->string('address_title')->default('Office Address');
            $table->string('office_address')->nullable();
            $table->string('directions_url')->nullable();
            $table->string('directions_button_text')->default('Directions');
    
            // Form section
            $table->string('form_title')->default('Get in Touch');
            $table->string('form_subtitle')->default('LEAVE US A MESSAGE');
    
            // Map
            $table->longText('map_iframe_src')->nullable(); // store iframe src only
    
            // Footer editable bits (optional)
            $table->string('footer_about')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
    
            // Working time + footer contact info
            $table->string('footer_phone')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('working_time')->nullable();
    
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
