<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;

class CardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $cards = Card::all();

        return view ('index', compact('cards'));
    }

    public function show(Card $card) //Card::find(wildcard) -> Card::find(wildcard)

    {
        return view('cards.show', compact('card'));
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store()
    {
        $this->validate(\request(), [
            'name' => 'required',
            'cardset' => 'required',
            'type' => 'required',
            'rarity' => 'required',
            'cost' => 'required',
            'attack' => 'required',
            'health' => 'required',
            'playerclass' => 'required',
            'img' => 'required',
        ]);

        Card::create(request([
            'name',
            'cardset',
            'type',
            'rarity',
            'cost',
            'attack',
            'health',
            'playerclass',
            'img'
        ]));

        return redirect('/');
    }


    public function addToWishlist(Request $request)
    {
        //validate request
//        $request->validate(\request(), ['cardId' => 'required']);

        $cardId = $request->input('cardId');

        //Pass the card id to to the attach method
        auth()->user()->attachCard($cardId);

        return redirect('/home');
    }

    public function removeFromWishlist(Request $request)
    {
        $cardId = $request->input('cardId');

        //Pass the card id to to the detach method
        auth()->user()->detachCard($cardId);

        return redirect('/home');
    }
}