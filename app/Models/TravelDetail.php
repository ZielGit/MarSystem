<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'travel_id', 'customer_id', 'product_id', 'product_type_id', 'weight', 'price_kilo', 'total_price'
    ];
}
