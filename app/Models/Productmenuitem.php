<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productmenuitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'location',
        'productmenu_id',
        'category_id',
    ];

    public function productmenu()
    {
        return $this->belongsTo(Productmenu::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
