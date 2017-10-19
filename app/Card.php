<?php

namespace App;

use Laravel\Scout\Searchable;

class card extends Model
{
    use Searchable;

    public function User()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }
}
