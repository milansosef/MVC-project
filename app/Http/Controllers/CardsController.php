<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Card;
use MongoDB\Driver\Query;

class CardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);

//        TODO: Error als je deze erin zet op edit pagina
//        $this->middleware('admin')->only(['edit', 'update', 'delete']);
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

    public function search(Query $query)
    {
//        $request->validate(['keyword' => 'required']);

//        $keyword = $request->input('keyword');

        //TODO: make searchbar work
//        $keyword = Input::get('keyword', '');
//        $cards = Card::SearchByKeyword($keyword)->get();

        $cards = Card::search($query)->get();

        return view('index', compact('cards'));
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store()
    {
        //TODO: Zet in aparte request file
        $this->validate(\request(), [
            'name' => 'required|string',
            'cardset' => 'required|string',
            'type' => 'required|string',
            'rarity' => 'required|string',
            'cost' => 'required|string',
            'attack' => 'required|integer',
            'health' => 'required|integer',
            'playerclass' => 'required|string',
            'img' => 'required|string',
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

    public function edit(Card $card)
    {
        return view('cards.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
//        $this->validate()

        $card->update($request->all());

        return back();
    }

    public function delete(Card $card)
    {

    }

    public function addToWishlist(Request $request, $cardId)
    {
        //Pass the card id to to the attach method
        auth()->user()->attachCard($cardId);

        return redirect('/home');
    }

    public function removeFromWishlist(Request $request, $cardId)
    {
        //Pass the card id to to the detach method
        auth()->user()->detachCard($cardId);

        return redirect('/home');
    }
}