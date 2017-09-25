<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /**
     * A user profile belongs to user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the cards associated with the given user profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cards()
    {
        return $this->belongsToMany('App\Card');
    }
}