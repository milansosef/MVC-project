<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use App\Comment;

class CommentsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function store(Card $card)
    {
//        Comment::create([
//           'body' => request(body),
//            'card_id' => $card->id
//        ]);

        $this->validate(request(), ['body' => 'required|min:2']);

        auth()->user()->publish(
          new Comment(request('body'))
        );
//
//        $card->addComment(request('body'));

        return back();
    }
}

//class CommentsController extends Controller
//{
//    public function store(Request $request)
//    {
//        $this->validate(request(), ['body' => 'required|min:2']);
//
//        $comment = Comment::create([
//            'body' => $request->input('body'),
//            'card_id' => $request->input('card_id')
//        ]);
//
//        $comment->save();
//
//
////
////        $card->addComment($comment);
//
//        return back();
//    }
//}
