<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'favorite_icon',
        'logo',
        'support',
        'main_color',
        'secondary_color',
        'seo_products',
        'seo_posts',
        'title_login_admin',
        'layout_not_found',
        'informational',
        'status',
    ];
}
