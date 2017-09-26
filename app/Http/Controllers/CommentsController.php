<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Card $card)
    {
        $this->validate(request(), ['body' => 'required|min:2']);

        $card->addComment(request('body'));

        return back();
    }
}
