<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productmenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'locationproductmenu_id',
    ];
    public function locationproductmenu()
    {
        return $this->belongsTo(Locationproductmenu::class);
    }

    public function productmenuitems()
    {
        return $this->hasMany(Productmenuitem::class);
    }
}
