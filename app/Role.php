<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Role extends BaseModel
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
