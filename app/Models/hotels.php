<?php

namespace App\Models;

use App\Models\city;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class hotels extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
protected $guard = "hotels";
protected $table = 'hotels';
protected $primaryKey = 'id';
protected $fillable =[
'id',
'Hotel_name',
'city_id',
'type',
'facilities',
'owner_name',
'email',
'phone_number',
'number_of_rooms',
'image',
'application_documents',
'location_id',
'password',
'status'
];
protected $hidden = [
    'password',
];

    public function city(){
        return $this->hasOne(city::class,'id','city_id');
    }

    public function users(){
        return   $this->hasMany(User::class);
    }
    public function rooms(){
        return $this->belgonsTo(rooms::class);
    }
    public function hotelInfo()
    {
        return $this->hasMany(HotelInfo::class);
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
