<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id', 'branch_office_id', 'departure_date', 'arrival_date'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class);
    }

    public function travelDetails()
    {
        return $this->hasMany(TravelDetail::class);
    }
}
