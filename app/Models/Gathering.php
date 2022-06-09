<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gathering extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'provider_id', 'start_time', 'end_time', 'weight'
    ];

    public function gatheringDetails()
    {
        return $this->hasMany(GatheringDetail::class);
    }
}
