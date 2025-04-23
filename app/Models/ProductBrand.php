<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductBrand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function categories()
    {
        return $this->hasMany(ProductCategory::class);
    }
}
