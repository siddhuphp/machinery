<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'short_desc',
        'description',
        'price',
        'offer_price',
        'product_image',
        'product_id',
        'category_id',
        'meta_title',
        'meta_keywords',
        'meta_desc',
        'created_by'
    ];
}
