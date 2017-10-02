<?php

namespace App;

class card extends Model
{

    /**
     * Get the user associated with the given card.
     *
     */
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
