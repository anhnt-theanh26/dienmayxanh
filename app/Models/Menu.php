<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'locationmenu_id',
    ];
    public function locationmenu()
    {
        return $this->belongsTo(Locationmenu::class);
    }

    public function menuitems()
    {
        return $this->hasMany(Menuitem::class);
    }
}
