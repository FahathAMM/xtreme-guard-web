<?php

namespace App\Models\Category;

use App\Helpers\Media;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Media;

    protected $fillable = [
        'name',
        'slug',
        'img',
        'is_active',
        'description',
        'parent_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('subcategories');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImgAttribute($value)
    {
        // Define the default image URL
        $defaultImage = 'https://www.hikvision.com/content/dam/hikvision/en/marketing/image/products/video-intercom-products/homepage/Video-Intercom_Homepage_product_IP.png.thumb.1280.1280.png';

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
