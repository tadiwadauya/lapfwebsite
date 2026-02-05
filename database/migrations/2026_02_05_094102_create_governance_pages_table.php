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
        Schema::create('governance_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Governance Structure Overview');
            $table->text('overview')->nullable();
    
            // bullet points (editable)
            $table->json('focus_areas')->nullable();
    
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governance_pages');
    }
};
