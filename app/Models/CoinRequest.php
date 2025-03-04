<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoinRequest extends Model
{
    protected $fillable = ['title','content', 'file_path'];
    protected $attributes = [
        'status' => 'W',
        'user_id' => 1,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
