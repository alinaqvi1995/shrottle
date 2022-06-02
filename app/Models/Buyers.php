<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyers extends Model
{
    use HasFactory;

    protected $table = 'buyer';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'country_code',
        'phone',
        'avatar',
        'license_no',
        'license_image',
    ];
}
