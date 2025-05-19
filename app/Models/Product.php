<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    'category_id',
    'name_en',
    'name_ar',
    'desc_en',
    'desc_ar',
    'price',
    'discount_price',
    'image',
    'images',
    'colors',
    'color_codes',
    'size',
];

protected $casts = [
    'images' => 'array',
    'colors' => 'array',
    'color_codes' => 'array',
    'size' => 'array',
];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
