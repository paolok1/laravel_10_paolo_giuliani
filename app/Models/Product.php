<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'body',
        'img',
        'user_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
