<?php

namespace App;

use Laravel\Scout\Searchable;

class card extends Model
{
    use Searchable;

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

//    public function SearchByKeyword($query, $keyword)
//    {
//        if ($keyword!='') {
//            $query->where(function ($query) use ($keyword) {
//                $query->where("name", "LIKE","%$keyword%");
//            });
//        }
//        return $query;
//    }
}
