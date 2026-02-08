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
        Schema::table('committee_members', function (Blueprint $table) {
            $table->boolean('is_chairperson')
                  ->default(false)
                  ->after('nominated_by');
        });
    }
    
    public function down(): void
    {
        Schema::table('committee_members', function (Blueprint $table) {
            $table->dropColumn('is_chairperson');
        });
    }
    
};
