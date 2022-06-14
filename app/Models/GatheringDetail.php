<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatheringDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'gathering_id', 'product_id', 'product_type_id', 'packages', 'weight'
    ];

    public function gathering()
    {
        return $this->belongsTo(Gathering::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
