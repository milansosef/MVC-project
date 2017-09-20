<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::pluck('img');

        return view ('index', compact('cards'));
    }

    public function show(Card $card) //Card::find(wildcard) -> Card::find(wildcard)

    {
        return $card;

        return view('cards.show', compact('card'));
    }
}
