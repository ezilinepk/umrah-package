<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    protected $fillable = [
        'visa_price',
        'visa_valid_date',
        'visa_exp_date',
        'visa_country',
        'visa_type',
        'visa_place_of_issue',
         'visa_price_with_transport'
    ];
}
