<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewHotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "Hotel_id",
        "userID_id",
        "rate",
        "comments"
    ];
    public function hotelInfo()
    {
        return $this->belongsTo(HotelInfo::class,'Hotel_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,"userID_id");
    }
}
