<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Intersted extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        "categoryId"
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class , "userID");
    }
    public function intersted()
    {
        return $this->belongsTo(Category::class , 'categoryId');
    }


}
