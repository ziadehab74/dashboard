<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class city extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable =[
    'id',
    'name_ar',
    'name_en'
    ];



    public function hotles(){
        $this->hasMany(hotles::class);
    }
    public function activity()
    {
        $this->hasMany(Activity::class);
    }
}
