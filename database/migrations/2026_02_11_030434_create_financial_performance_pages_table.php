<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('financial_performance_pages', function (Blueprint $table) {
            $table->id();

            $table->string('title')->default('Financial Performance');
            $table->string('cover_image')->nullable(); // cover photo path
            $table->string('pdf_file')->nullable();    // pdf path
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_performance_pages');
    }
};
