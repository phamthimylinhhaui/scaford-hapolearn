<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCourse extends Model
{
    use HasFactory;
    use  SoftDeletes;

    protected $table = 'user_course';

    protected $fillable = [
        'user_id',
        'course_id'
    ];
    
    public function scopeTotalLearner()
    {
        return $this->join('users', 'users.id', '=', 'user_course.user_id')
            ->where('role', '=', config('roles.user'))->count();
    }
}
