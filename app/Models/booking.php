<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class booking extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function user() {
        $this->belgonsTo(User::class);
    }

}
