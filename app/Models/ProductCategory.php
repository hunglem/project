<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function brands()
    {
        return $this->hasMany(ProductBrand::class);
    }
    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
