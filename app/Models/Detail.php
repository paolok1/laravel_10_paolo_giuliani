<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'title',
        'description',
        'body',
        'img'
    ];
        
    
}
