<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherCourse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'teacher_course';

    protected $fillable = [
        'user_id',
        'course_id',
        'teach_time'
    ];
}
