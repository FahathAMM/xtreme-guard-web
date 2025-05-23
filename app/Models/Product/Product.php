<?php

namespace App\Models\Product;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Category\Category;
use App\Models\Product\ProductImage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\ProductAttachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $with = ['mainImage'];

    protected $fillable = [
        'name',
        'description',
        'original_price',
        'quantity',
        'sku',
        'brand_id',
        'category_id',
        'subcategory',
        'status',
        'main_image',
        'discount_percentage',
        'meta_title',
        'meta_description',
        'slug',
        'warranty',
        'features',
        'specifications',
        'weight',
        'dimensions',
        'condition',
        'file_category',
        'is_available',
        'sale_price',

        'colors',
        'tags',
        'short_desc',
        'view_count',
    ];

    protected $casts = [
        'tags' => 'array',
        'colors' => 'array',
    ];

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class);
    }

    public function gallery()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function files()
    {
        return $this->hasMany(ProductAttachment::class)->orderBy('created_at', 'desc');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $request)
    {
        return $query->when($request->filled('q'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->q . '%');
        });
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['sku'] = 'SKU-' . ucwords(Str::slug($value));
    }
}
