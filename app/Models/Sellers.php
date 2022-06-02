<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    use HasFactory;

    protected $table = 'seller';

    protected $fillable = [
        'user_id',
        'name',
        'country_code',
        'phone',
        'description',
        'avatar',
        'company_name',
        'company_logo',
        'address',
        'state',
        'city',
        'zip_code',
        'country',
    ];
    
    public function bike()
    {
        return $this->hasMany(Bike::class, 'seller_id', 'id');
    }
}
