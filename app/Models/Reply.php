<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'review_id',
        'user_id',
        'content'
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isMyReply()
    {
        return $this->where('replies.id', $this->id)->where('replies.user_id', auth()->id())->exists();
    }
}
