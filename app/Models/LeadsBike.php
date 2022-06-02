<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsBike extends Model
{
    use HasFactory;

    protected $table = 'leads_bike';

    protected $fillable = [
        'user_id',
        'bike_id',
        'pickup_loc',
        'dropoff_loc',
        'pickup_date',
        'pickup_time',
        'dropoff_date',
        'dropoff_time',
        'stripeChargeId',
        'totalRent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function bike()
    {
        return $this->belongsTo(Bike::class, 'bike_id', 'id');
    }
}
