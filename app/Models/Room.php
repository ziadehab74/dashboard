<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{    use SoftDeletes;

     protected
    $casts = [
    'images' => 'array',
];
protected $fillable =
[
    "Hotel_id",
    "numnberOfBeds",
    "booked",
    "priceperDay",
    "images",
    "descripions"
];
    use HasFactory;
    public function hotles(){
     return   $this->belongsTo(HotelInfo::class,"Hotel_id");
    }
}
