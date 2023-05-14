<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingRoom extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $table = 'booking_rooms';

    protected $fillable  =
    [
        'hotel_info_id',
        'room_id',
        'user_id',
        'num_of_nights',
        'num_of_guests',
        'total_price',
        'check_in',
        'check_out',
        'status',
        'payment_status',
        'payment_method',

    ];
    public function hotel()
    {
        return $this->belongsTo(HotelInfo::class , "hotel_info_id");
    }
    public function room()
    {
        return $this->belongsTo(Room::class , "room_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }

}
