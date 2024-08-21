<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport_type',
        'price_airport_makkah',
        'price_makkah_madina',
        'price_madina_makkah',
        'currency',
    ];
}
