<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'main_img',
        'gallery',
        'content',
        'is_published'
    ];

    // Optionally, you can add custom methods or relationships
}
