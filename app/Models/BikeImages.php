<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeImages extends Model
{
    use HasFactory;

    protected $table = 'bike_images';

    protected $fillable = [
        'bike_id',
        'image',
    ];
}
