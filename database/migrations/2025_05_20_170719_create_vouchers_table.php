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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('promo_code');
            $table->unsignedInteger('discount_percentage');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('time')->nullable();
            $table->boolean('status')->default(true);
            $table->decimal('max_discount', 20, 0)->nullable();
            $table->unsignedInteger('max_use')->default(0);
            $table->decimal('discount_condition', 20, 0)->default(0);
            $table->longText('users')->nullable();
            $table->longText('products')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
