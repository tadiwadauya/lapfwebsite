<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_intros', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->default('Welcome to');
            $table->string('title')->default('Local Authorities Pension Fund');
            $table->text('body')->nullable();
            $table->string('image')->nullable(); // store path like home/intro.jpg
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_intros');
    }
};
