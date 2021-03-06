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

    public function programs()
    {
        return $this->hasMany(Program::class, 'lesson_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lesson', 'lesson_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
