<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sellers;
use App\Models\BikeImages;

class Bike extends Model
{
    use HasFactory;

    protected $table = 'bike';

    protected $fillable = [
        'seller_id',
        'mileage', // model
        'brand',
        'cc',
        'description',
        'fea_image',
        'reg_no',
        'regNoImage',
        'type',
        'availablity',
        'weight',
        'seat_height',
        'lugaggeR',
        'lugaggeL',
        'lugaggeT',
        'rentPerDay',
        'hp',
        'country',
        'city',
        'state',
        'zipCode',
        'status',
        'mileage_bike',
        'title',
        'slug',
        'pickup_loc',
    ];

    public function seller()
    {
        return $this->belongsTo(Sellers::class, 'seller_id', 'id');
    }
    public function gallery()
    {
        return $this->hasMany(BikeImages::class, 'bike_id', 'id');
    }
    public function bike_brand()
    {
        return $this->belongsTo(Brands::class, 'brand', 'id');
    }
    public function bike_type()
    {
        return $this->belongsTo(BikeTypes::class, 'type', 'id');
    }
    public function bike_country()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
    public function bike_state()
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }
    public function bike_city()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }
}
