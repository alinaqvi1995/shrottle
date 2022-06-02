<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $table = 'subscribed_users';

    protected $fillable = [
        'email',
        'status',
    ];
}
