<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_description',
        'long_description',
        'price',
        'registration_date',
        'features',
    ];

    protected $dates = [
        'registration_date',
    ];
}
