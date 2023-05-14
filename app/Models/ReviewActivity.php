<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewActivity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "activity_id",
        "user_id",
        "rate",
        "comment"
    ];
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
