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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->string('code')->unique();
            $table->decimal('discount', 20, 0)->nullable();
            $table->decimal('total_amount', 20, 0)->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('recipient_name')->nullable();
            $table->date('order_date')->nullable();
            $table->date('transaction_time')->nullable()->after('order_date');
            $table->date('expiry_time')->nullable()->after('order_date');
            $table->text('node')->nullable();
            $table->enum('payment_method', ['online', 'offline'])->default('offline');
            $table->integer('status')->default(1);
            $table->enum('payment_status', ['Paid', 'Payment Failed', 'Unpaid'])->default('Unpaid');
            $table->boolean('refund')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
