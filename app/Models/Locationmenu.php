<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locationmenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
