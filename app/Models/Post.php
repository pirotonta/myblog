<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'title',
        'user_id',
        'habilitated',
        'thumbnail',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
