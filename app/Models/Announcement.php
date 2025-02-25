<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = ['title','content',];
    protected $attributes = [
    // TODO USER ID
        'user_id' => 1,
    ];
}
