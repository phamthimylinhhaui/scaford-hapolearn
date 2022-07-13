<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use  SoftDeletes;

    protected $fillable = [
        'name',
        'lesson_id',
        'path',
        'type'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_program', 'program_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
