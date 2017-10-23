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

    public function changeState($card)
    {
        if ($card->state == 1)
        {
            $newState = 0;
        }
        else {
            $newState = 1;
        }

        $card->state = $newState;

        $card->save();
    }
}
