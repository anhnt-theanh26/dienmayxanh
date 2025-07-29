<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'is_hot',
        'category_parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(CategoryParent::class, 'category_parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
