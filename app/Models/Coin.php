<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = ['type','amount', 'description'];
    protected $attributes = [
        'user_id' => 1,
        'description' => "",
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
