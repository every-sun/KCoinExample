<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoinRequest extends Model
{
    protected $fillable = ['used_coins','product_id', 'cancel_request_date', 'cancel_complete_date', 'completed_date'];
    protected $attributes = [
        'status' => 'W',
        'user_id' => 1,
        'cancel_request_date' => null,
        'cancel_complete_date' => null,
        'completed_date' => null
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
