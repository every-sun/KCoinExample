<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description', 'price', 'image_url', 'category'];
    protected $attributes = [
        'description' => '',
        'category' => null,
    ];
}
