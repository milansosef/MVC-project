<?php

namespace App;

class card extends Model
{

    /**
     * Get the user profiles associated with the given card.
     *
     */
    public function userProfiles()
    {
        $this->belongsToMany('App\UserProfile');
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
