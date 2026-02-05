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
    Schema::create('committee_members', function (Blueprint $table) {
        $table->id();
        $table->foreignId('committee_id')->constrained()->cascadeOnDelete();

        $table->string('member_name');              // "E. Mandiziba (Chairperson)"
        $table->string('qualifications')->nullable(); // "MBA, BSC Admin..."
        $table->string('nominated_by')->nullable();   // "Group III Employees’ Representative"
        $table->unsignedInteger('sort_order')->default(0);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committee_members');
    }
};
