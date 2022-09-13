<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'course_id',
        'image',
        'times',
        'description',
        'document',
        'requirement'
    ];

    public function getTotalLearnedProgramAttribute()
    {
        $programs = $this->programs();
        return $programs->whereHas('users', function ($query) {
            $query->where('user_program.user_id', auth()->id())->where('lesson_id', $this->id);
        })->count();
    }

    public function getStatusCompletedLessonAttribute()
    {
        $totalPrograms = $this->programs()->count();
        $learning = $this->programs()->whereHas('users', function ($query) {
            $query->where('user_program.user_id', auth()->id())->where('lesson_id', $this->id);
        })->count();

        return $learning == $totalPrograms ? config('config.leaned') : config('config.learning');
    }

    public function isLearnedLesson()
    {
        return $this->users()->whereExists(function ($query) {
            $query->where('user_id', auth()->id());
        })->exists();
    }

    public function getTotalProgramAttribute()
    {
        return $this->programs()->count();
    }

    public function scopeSearch($query, $data)
    {
        if (isset($data['lesson_name'])) {
            $query->where('name', 'LIKE', "%". $data['lesson_name'] ."%");
        }

        return $query;
    }

    public function programs()
    {
        return $this->hasMany(Program::class, 'lesson_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lesson', 'lesson_id')->withTimestamps();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
