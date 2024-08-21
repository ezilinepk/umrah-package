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
        'room_price_sharing_currency',
        'room_price_quint',
        'room_price_quint_currency',
        'room_price_triple',
        'room_price_triple_currency',
        'room_price_double',
        'room_price_double_currency',
        'room_price_quad',
        'room_price_quad_currency',
        'hotel_room_details',
        'hotel_details',
        'monday_price_sharing',
        'monday_price_sharing_currency',
        'tuesday_price_sharing',
        'tuesday_price_sharing_currency',
        'wednesday_price_sharing',
        'wednesday_price_sharing_currency',
        'thursday_price_sharing',
        'thursday_price_sharing_currency',
        'friday_price_sharing',
        'friday_price_sharing_currency',
        'saturday_price_sharing',
        'saturday_price_sharing_currency',
        'sunday_price_sharing',
        'sunday_price_sharing_currency',
        'monday_price_quint',
        'monday_price_quint_currency',
        'tuesday_price_quint',
        'tuesday_price_quint_currency',
        'wednesday_price_quint',
        'wednesday_price_quint_currency',
        'thursday_price_quint',
        'thursday_price_quint_currency',
        'friday_price_quint',
        'friday_price_quint_currency',
        'saturday_price_quint',
        'saturday_price_quint_currency',
        'sunday_price_quint',
        'sunday_price_quint_currency',
        'monday_price_triple',
        'monday_price_triple_currency',
        'tuesday_price_triple',
        'tuesday_price_triple_currency',
        'wednesday_price_triple',
        'wednesday_price_triple_currency',
        'thursday_price_triple',
        'thursday_price_triple_currency',
        'friday_price_triple',
        'friday_price_triple_currency',
        'saturday_price_triple',
        'saturday_price_triple_currency',
        'sunday_price_triple',
        'sunday_price_triple_currency',
        'monday_price_double',
        'monday_price_double_currency',
        'tuesday_price_double',
        'tuesday_price_double_currency',
        'wednesday_price_double',
        'wednesday_price_double_currency',
        'thursday_price_double',
        'thursday_price_double_currency',
        'friday_price_double',
        'friday_price_double_currency',
        'saturday_price_double',
        'saturday_price_double_currency',
        'sunday_price_double',
        'sunday_price_double_currency',


    ];
    public function images()
{
    return $this->hasMany(HotelImage::class);
}



}
