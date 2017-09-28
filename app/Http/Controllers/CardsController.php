<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;

class CardsController extends Controller
{
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
}