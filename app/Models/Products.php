<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'sku',
        'name',
        'product_URL',
        'price',
        'retail_price',
        'thumbnail_URL',
        'search_keywords',
        'description',
        'brand',
        'child_sku',
        'child_price',
        'category_id',
        'color',
        'color_family',
        'color_swatches',
        'size',
        'shoe_size',
        'pants_size',
        'occassion',
        'season',
        'badges',
        'rating_avg',
        'rating_count',
        'inventory_count',
        'created_at'

    ];
}
