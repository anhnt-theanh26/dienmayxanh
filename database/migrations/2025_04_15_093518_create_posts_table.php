<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->bigInteger('view_count')->default(0);
            $table->boolean('is_hot')->default(false);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->dateTime('published_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
