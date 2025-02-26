<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inquiry extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'type'];
    
    protected $attributes = [
        'status' => 'W',
        'user_id' => 1,
        'type' => 'A'
    ];

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
