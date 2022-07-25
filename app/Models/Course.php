<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'price',
        'description'
    ];

    public function scopeMain($query)
    {
        return $query->take(config('config_queries.show_course_homepage'))->get();
    }

    public function scopeOtherCourse($query)
    {
        return $query->inRandomOrder()->take(config('config_queries.show_course_homepage'))->get();
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course', 'course_id');
    }

    public function teacherCourse()
    {
        return $this->belongsToMany(User::class, 'user_course', 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag', 'course_id');
    }
}
