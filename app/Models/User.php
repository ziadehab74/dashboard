<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
//  MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable ;

    /**
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'status',
        'email_verified_at',
        'nationality',
        'location',
        'birthday',
        "profile_image"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'location' => 'array',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    // public function setPasswordAttribute($password)
    // {
    //     return $this->attributes['password'] = Hash::make($password);
    // }
    // public function sendPasswordResetNotification($token)
    // {

    //     $url = 'https://spa.test/reset-password?token=' . $token;

    //     $this->notify(new ResetPasswordNotification($url));
    // }
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
    public function bookings() {
        $this->hasMany(booking::class);
    }
    public function hotles() {
        $this->hasMany(hotels::class);
    }
    public function reviewActivity() {
        $this->hasMany(ReviewActivity::class);
    }
    public function reviewHotel()
    {
        return $this->hasMany(ReviewHotel::class);
    }
    public function userIntersed()
    {
        return $this->belongsTo(User_Intersted::class);
    }

}
