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

    public function scopeFeedback()
    {
        return $this->join('users', 'users.id', '=', 'reviews.user_id')
            ->join('courses', 'courses.id', '=', 'reviews.course_id')
            ->select('content', 'users.avatar', 'users.user_name', 'courses.name', 'reviews.rate')
            ->limit(SHOW_FEEDBACK)->get();
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
