<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    protected $fillable = [
        'hotel_name',
        'hotel_city',
        'hotel_google_map',
        'hotel_star',
        'hotel_distance',
        'hotel_picture',
        'room_price_sharing',
        'room_price_quint',
        'room_price_triple',
        'room_price_double',
        'room_price_quad',
        'package_name',
        'phone_numbers',
        'emails',
        'addresses'



    ];
    public function images()
{
    return $this->hasMany(HotelImage::class);
}


public function packages()
{
    return $this->belongsToMany(HotelPackage::class, 'hotel_package_hotel', 'hotel_id', 'package_id');
}





}
