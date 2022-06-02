<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTestimonials extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = [
        'user_id',
        'rating',
        'avatar',
        'description',
        'name',
        'title',
        'status',
    ];
}
