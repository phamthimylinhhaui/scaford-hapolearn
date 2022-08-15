<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'full_name',
        'email',
        'password',
        'avatar',
        'phone',
        'address',
        'date_of_birth',
        'role',
        'about_me'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeTeachers()
    {
        return $this->where('role', config('roles.teacher'));
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_course', 'user_id');
    }

    public function teacherCourse()
    {
        return $this->belongsToMany(Course::class, 'teacher_course', 'user_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Course::class, 'teacher_course', 'user_id');
    }

    public function programs()
    {
        return $this->belongsToMany(Course::class, 'teacher_course', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
}
