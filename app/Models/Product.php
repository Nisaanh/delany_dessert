<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id', 
        'name', 
        'description', 
        'price', 
        'image', 
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
    
    protected $appends = ['formatted_price', 'image_url'];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getFormattedPriceAttribute()
    {
        // Cara 1: Menggunakan number_format (paling aman)
        return 'Rp ' . number_format($this->price, 0, ',', '.');
        
        // Cara 2: Jika ingin menggunakan Number::format (Laravel 10+)
        // return 'Rp ' . \Illuminate\Support\Number::format($this->price, 0, ',', '.');
        
        // Cara 3: Menggunakan Number::format dengan parameter yang benar
        // return 'Rp ' . \Illuminate\Support\Number::format($this->price, precision: 0);
    }
    
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        return asset('images/placeholder-product.jpg');
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)
                    ->where('is_active', true);
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}