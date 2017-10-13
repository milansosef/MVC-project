<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    Relations
    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

//    Check the users role
    public function is($roleName)
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }

    public function publish(Comment $comment)
    {
        $this->comments()->save($comment);
    }

    public function attachCard($cardId)
    {
        $this->cards()->attach($cardId);
    }

    public function detachCard($cardId)
    {
        $this->cards()->detach($cardId);
    }

    public function updateDust($newDust)
    {
        $this->dust = $newDust;

        $this->save();
    }
}
