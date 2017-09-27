<?php

namespace App;

class Comment extends Model
{
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
