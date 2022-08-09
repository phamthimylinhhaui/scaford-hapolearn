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

    public function scopeIsReview()
    {
        return auth()->check() && $this->reviews()->whereExists(function ($query) {
                $query->where('user_id', auth()->id());
        })->count() > 0;
    }

    public function scopeGetCountStars()
    {
        return [
            'one_star' => $this->reviews()->where('rate', 1)->count(),
            'two_star' => $this->reviews()->where('rate', 2)->count(),
            'three_star' => $this->reviews()->where('rate', 3)->count(),
            'four_star' => $this->reviews()->where('rate', 4)->count(),
            'five_star' => $this->reviews()->where('rate', 5)->count(),
        ];
    }

    public function getRateAttribute()
    {
        return $this->reviews()->avg('rate');
    }

    public function getCountReviewAttribute()
    {
        return $this->reviews()->count();
    }

    public function scopeIsJoined()
    {
        return auth()->check() && $this->users()->whereExists(function ($query) {
            $query->where('user_id', auth()->id());
        })->count() > 0;
    }

    public function scopeIsSoftDelete()
    {
        return auth()->check() && $this->users()->whereExists(function ($query) {
                $query->where('user_id', auth()->id());
        })->where('user_course.deleted_at', '<>', null)->count() > 0;
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('name', 'LIKE', "%". $data['keyword'] ."%")->orWhere('description', 'LIKE', "%". $data['keyword'] ."%");
        }

        if (isset($data['created_time'])) {
            $query->orderBy('courses.created_at', $data['created_time']);
        }

        if (isset($data['teachers']) && count($data['teachers']) > 0) {
            $query->whereHas('users', function ($query) use ($data) {
                $query->where('users.role', config('roles.teacher'))->whereIn('user_id', $data['teachers']);
            });
        }

        if (isset($data['learner']) && !empty($data['learner'])) {
            $query->withCount('users')->orderBy('users_count', $data['learner']);
        }

        if (isset($data['time']) && !empty($data['time'])) {
            $query->withSum('lessons', 'times')->orderBy('lessons_sum_times', $data['time']);
        }

        if (isset($data['lesson']) && !empty($data['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $data['lesson']);
        }

        if (isset($data['tags']) && count($data['tags']) > 0) {
            $query->whereHas('tags', function ($query) use ($data) {
                $query->whereIn('tag_id', $data['tags']);
            });
        }

        if (isset($data['rate']) && !empty($data['rate'])) {
            $query->withCount('reviews')->orderBy('reviews_count', $data['rate']);
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
        return $query->inRandomOrder();
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

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_course', 'course_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'course_tag', 'course_id');
    }
}
