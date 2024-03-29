<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'product_id', 'stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
