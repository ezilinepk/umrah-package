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
        'hotel_room_detail',
        'hotel_details',
        'phone_numbers',
        'emails',
        'addresses'



    ];
    public function images()
{
    return $this->hasMany(HotelImage::class);
}



}
