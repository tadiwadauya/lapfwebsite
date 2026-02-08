<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();

            $table->string('name');                 // Department name
            $table->string('slug')->unique();       // for front URL e.g. pensions-administration
            $table->string('icon')->nullable();     // e.g. "icon-report"
            $table->text('short_description')->nullable(); // card text
            $table->longText('description')->nullable();   // full text (details page)

            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
