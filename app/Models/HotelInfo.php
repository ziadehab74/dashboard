<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelInfo extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'hotel_name',
        'images',
        'location',
        'OPTIONS',
        'city_id',
        'type_of_room',

    ];
    protected $casts = [
        'images' => 'array',
        'location' => 'array',
        'OPTIONS' => 'array',
    ];
    public function reviewHotel()
    {
       $review =  $this->hasMany(ReviewHotel::class , "Hotel_id");
        return  $review;
    }
    public function room()
    {
        return $this->hasMany(Room::class , "hotel_id");
    }
    public function hotelManager()
    {
        return $this->belongsTo(hotels::class , "hotel_id");
    }
}
