<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['product_id', 'color', 'size', 'material'];

    // Define the inverse of the one-to-one relationship
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
