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
            // Người đặt hàng (có thể null nếu xóa tài khoản)
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null'); // người đặt hàng
            // Mã đơn hàng (duy nhất)
            $table->string('code')->unique(); // mã đơn hàng
            // Số tiền được giảm giá (nếu có)
            $table->decimal('discount', 20, 0)->nullable(); // giảm giá
            // Tổng tiền phải thanh toán sau giảm giá
            $table->decimal('total_amount', 20, 0)->nullable(); // tổng tiền
            // Địa chỉ nhận hàng
            $table->text('shipping_address')->nullable(); // địa chỉ người nhận
            // Số điện thoại người nhận
            $table->string('phone')->nullable(); // số điện thoại người nhận
            // Tên người nhận hàng
            $table->string('recipient_name')->nullable(); // tên người nhận
            // Ngày đặt hàng
            $table->date('order_date')->nullable(); // ngày đặt hàng
            // Thời gian thanh toán thành công (chỉ có khi thanh toán online thành công)
            $table->dateTime('transaction_time')->nullable(); // thời gian giao dịch
            // Hạn cuối thanh toán (áp dụng cho đơn hàng online)
            $table->dateTime('expiry_time')->nullable(); // thời gian hết hạn thanh toán đơn hàng online
            // Ghi chú từ khách hàng (nếu có)
            $table->text('note')->nullable(); // ghi chú
            // Phương thức thanh toán: online hoặc offline
            $table->enum('payment_method', ['online', 'offline'])->default('offline'); // phương thức thanh toán
            //  $table->enum('payment_method', ['cod', 'momo', 'vnpay', 'zalopay', 'stripe'])->default('cod'); // thanh toán qua nhiều cổng(chưa sử dụng)
            // Trạng thái đơn hàng                  ['Đang chờ', 'Đã xác nhận', 'Đang chuẩn bị', 'Đang vận chuyển', 'Đã giao'  , 'Đã hủy'   , 'Đã trả lại', 'Đã hoàn tiền', 'Không thành công']
            $table->enum('status', ['Pending' , 'Confirmed'  , 'Preparing'    , 'Shipping'       , 'Delivered', 'Cancelled', 'Returned'  , 'Refunded'    , 'Failed'])->default('Pending'); // trạng thái đơn hàng
            // Trạng thái thanh toán: đã thanh toán, lỗi, chưa thanh toán
            $table->enum('payment_status', ['Paid', 'Payment Failed', 'Unpaid'])->default('Unpaid'); // trạng thái thanh toán
            // Mã giao dịch trả về từ cổng thanh toán (để xác nhận thanh toán thành công)
            $table->string('transaction_id')->nullable()->unique(); // Lưu mã giao dịch từ cổng, kiểm tra đơn hàng được thanh toán thành công hay chưa 
            // Lý do hủy
            $table->text('reason_cancel')->nullable(); // lý do hủy
            // Đánh dấu đơn hàng đã hoàn tiền hay chưa
            $table->boolean('refund')->default(false); // hoàn tiền
            // Số tiền hoàn trả (nếu có)
            $table->decimal('refund_amount', 20, 0)->nullable(); // số tiền hoàn trả
            // Lý do hoàn tiền
            $table->text('refund_reason')->nullable(); // lý do hoàn tiền
            // Mã giao dịch hoàn tiền do cổng thanh toán cấp
            $table->string('refund_transaction_id')->nullable()->unique(); // mã giao dịch hoàn tiền
            // Thời gian hoàn tiền
            $table->dateTime('refund_time')->nullable(); // thời gian hoàn tiền
            // Trạng thái hoàn tiền
            $table->enum('refund_status', ['Pending', 'Success', 'Failed'])->nullable();// trạng thái hoàn tiền
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
