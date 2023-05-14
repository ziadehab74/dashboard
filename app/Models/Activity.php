<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

    'activityName' ,
    'activityPrice',
    'description',
    'openTime',
    'closeTime',
    'location',
    'images',
    'category_id',
    'city_id',
    'hotel_id',
];
protected $casts = [
    'images' => 'array',
    'location' => 'array',
];

    public function category()
    {
        return $this->belongsTo(Category::class ,"category_id");
    }
    public function city()
    {
        return $this->belongsTo(city::class , "city_id");
    }
    public function review()
    {
        return $this->hasMany(ReviewActivity::class);
    }
 public function activity()
    {
        return   $this->belongsTo(BookedActivity::class);
    }
    public function hotel()
    {
        return  $this->belongsTo(hotels::class,"hotel_id" );
    }
}
