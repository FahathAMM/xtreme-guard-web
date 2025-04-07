<?php

namespace App\Models\Solution;

use App\Helpers\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    use HasFactory, Media;

    protected $fillable = [
        'title',
        'slug',
        'solution_type',
        'banner_img',
        'img_width',
        'img_height',
        'gallery',
        'tags',
        'file',
        'content',
        'desc',
        'is_published',
    ];

    protected $casts = [
        'tags' => 'array',
        'file' => 'array',
        'is_published' => 'boolean',
    ];


    public function getBannerImgAttribute($value)
    {
        // Define the default image URL
        $defaultImage = 'https://xtremeguard.org/site/images/home/game13.png';

        // Check if the value is empty
        if (!$value) {
            return $defaultImage;
        }

        // Check if the file exists in storage
        if (Storage::exists('public/' . $value)) {
            return asset('storage/' . $value);
        } else {
            return $defaultImage;
        }
    }
}
