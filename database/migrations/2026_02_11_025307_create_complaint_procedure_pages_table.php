<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('complaint_procedure_pages', function (Blueprint $table) {
            $table->id();

            $table->string('title')->default('Complaints Handling Procedure');
            $table->string('image')->nullable(); // image path in storage
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaint_procedure_pages');
    }
};
