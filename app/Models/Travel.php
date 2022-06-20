<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id', 'departure_date', 'arrival_date'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
