<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gathering extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'provider_id', 'start_time', 'end_time', 'carton_weight', 'plastic_weight', 'paper_weight', 'overall_weight'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gatheringDetails()
    {
        return $this->hasMany(GatheringDetail::class);
    }
}
