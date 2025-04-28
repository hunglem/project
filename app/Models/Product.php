<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'processor_info', 'technology_info', 'amount', 'image_url'];

    public function categories()
    {
        return $this->hasMany(ProductCategory::class);
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