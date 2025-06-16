<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('logo')->nullable();
            $table->text('support')->nullable();
            $table->text('main_color')->nullable();
            $table->text('secondary_color')->nullable();
            $table->text('seo_products')->nullable();
            $table->text('seo_posts')->nullable();
            $table->text('title_login_admin')->nullable();
            $table->text('layout_not_found')->nullable();
            $table->text('informational')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
