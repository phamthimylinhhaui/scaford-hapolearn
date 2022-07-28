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

    public function scopeSearch($query, $data)
    {
        if (isset($data['course_name'])) {
            $query->where('name', 'LIKE', "%". $data['course_name'] ."%");
        }

        if (isset($data['course_create'])) {
            $data['course_create'] == "newest" ? $query->orderby('courses.created_at', 'DESC') : $query->orderby('courses.created_at');
        }

        if (isset($data['teacher_id']) && !empty($data['teacher_id'])) {
            $query->join('teacher_course', 'courses.id', '=', 'teacher_course.course_id')
                ->where('user_id', $data['teacher_id']);
        }

        if (isset($data['order_by_learner']) && !empty($data['order_by_learner'])) {
            $query->withCount('users');
            $query->orderBy('users_count', $data['order_by_learner']);
        }

        if (isset($data['order_by_time']) && !empty($data['order_by_time'])) {
            $query->withCount('lessons')->withSum('lessons', 'times');
            $query->orderBy('lessons_sum_times', $data['order_by_time']);
        }

        if (isset($data['order_by_lesson']) && !empty($data['order_by_lesson'])) {
            $query->withCount('lessons');
            $query->orderBy('lessons_count', $data['order_by_lesson']);
        }

        if (isset($data['tags']) && count($data['tags']) > 0) {
            $query->join('course_tag', 'courses.id', '=', 'course_tag.course_id')
                ->whereIn('tag_id', $data['tags']);
        }

        if (isset($data['reviews']) && !empty($data['reviews'])) {
            $query->withCount('reviews');
            $query->orderBy('reviews_count', $data['reviews']);
        }

        return $query;
    }

    public function getLearnersAttribute()
    {
        return $this->users()->count();
    }

    public function getTotalLessonsAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTotalTimesAttribute()
    {
        return $this->lessons()->sum('times');
    }

    public function scopeMain($query)
    {
        return $query->take(config('config.home_course_order'));
    }

    public function scopeOtherCourse($query)
    {
        return $query->inRandomOrder()->take(config('config.home_course_order'));
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
