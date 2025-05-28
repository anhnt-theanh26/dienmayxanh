<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'discount',
        'total_amount',
        'shipping_address',
        'phone',
        'recipient_name',
        'order_date',
        'transaction_time',
        'expiry_time',
        'note',
        'payment_method',
        'status',
        'payment_status',
        'transaction_id',
        'reason_cancel',
        'refund',
        'refund_amount',
        'refund_transaction_id',
        'refund_time',
        'refund_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function billItems()
    {
        return $this->hasMany(BillItem::class);
    }
}
