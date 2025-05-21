<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_code',
        'discount_percentage',
        'start_date',
        'end_date',
        'time',
        'status',
        'max_discount',
        'max_use',
        'discount_condition',
        'users',
        'products',
    ];
}
