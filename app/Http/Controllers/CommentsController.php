<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckLogins');
    }

    public function store(Card $card)
    {
        $this->validate(request(), ['body' => 'required|min:2|string']);

        auth()->user()->publish(
          new Comment([
              'body' => request('body'),
              'card_id' => $card->id
          ])
        );

        return back();
    }
}