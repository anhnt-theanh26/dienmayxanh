<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bannermenuitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'link',
        'location',
        'bannermenu_id'
    ];
    
     public function bannermenu()
    {
        return $this->belongsTo(Bannermenu::class);
    }
}
