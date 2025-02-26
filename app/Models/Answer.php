<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['inquiry_id', 'content'];

    protected $attributes = [
        'user_id' => 1,
    ];

    public function inquiry(){
        return $this->belongsTo(Inquiry::class);
    }
}
