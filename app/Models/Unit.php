<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_name',
        'block_name',
        'unit_number',
        'unit_type',
        'land_area',
        'building_area',
        'bedrooms',
        'bathrooms',
        'price',
        'booking_fee',
        'status',
        'notes',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'booking_fee' => 'decimal:2',
    ];
}