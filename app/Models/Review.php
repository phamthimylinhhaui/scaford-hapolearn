<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;
    use  SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_id',
        'content',
        'parent_id',
        'rate',
    ];

    public function scopeFeedback($query)
    {
        return $query->take(config('config.home_feedback_order'));
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
