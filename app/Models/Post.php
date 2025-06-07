<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'habilitated',
        'image_path',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function rating()
    {
        return $this->votes()->sum('value');
    }



    public function userVote($user)
    {
        $votes = null;

        if ($this->relationLoaded('votes')) {
            $votes = $this->votes->first();
        }

        $votes = $this->votes()->where('user_id', $user->id)->first();

        return $votes;
    }

    public function scopeSorted($query, $sort)
    {
        switch ($sort) {
            case 'views':
                $posts = $query->orderBy('views', 'desc');
            case 'comments':
                $posts = $query->withCount('comments')->orderBy('comments_count', 'desc');
            case 'rating':
                $posts = $query->orderBy('rating', 'desc');
            case 'random':
                $posts = $query->inRandomOrder();
            case 'latest':
            default:
                $posts = $query->orderBy('id', 'desc');
        }

        return $posts;
    }
}
