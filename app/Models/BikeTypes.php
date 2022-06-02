<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeTypes extends Model
{
    use HasFactory;

    protected $table = 'bike_types';

    protected $fillable = [
        'name',
        'status',
    ];
}
