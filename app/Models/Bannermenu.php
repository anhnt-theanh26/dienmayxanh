<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannermenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'locationbannermenu_id',
    ];

    public function locationbannermenu()
    {
        return $this->belongsTo(Locationbannermenu::class);
    }

    public function bannermenuitems()
    {
        return $this->hasMany(Bannermenuitem::class);
    }

}
