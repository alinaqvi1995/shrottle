<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerGallery extends Model
{
    use HasFactory;

    protected $table = 'vandor_gallery';

    protected $fillable = [
        'seller_id',
        'image',
    ];
}
