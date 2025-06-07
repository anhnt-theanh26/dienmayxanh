<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'support',
        'main_color',
        'seo_products',
        'seo_posts',
        'layout_not_found',
        'title_login_admin',
        'status',
    ];
}
