<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
