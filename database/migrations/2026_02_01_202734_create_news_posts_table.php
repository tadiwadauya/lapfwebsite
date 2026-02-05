<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author_name')->default('Admin');
            $table->unsignedInteger('comments_count')->default(0);

            $table->string('excerpt', 500)->nullable();
            $table->longText('body')->nullable();

            $table->string('image')->nullable(); // storage path
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_published')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_posts');
    }
};
