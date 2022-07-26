<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'customer_id', 'product_type_id', 'date', 'lot', 'quantity_released', 'observations'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}
