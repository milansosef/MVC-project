<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCard;
use Illuminate\Http\Request;

use App\Card;
use MongoDB\Driver\Query;

class CardsController extends Controller
{
    public function index()
    {
        if ($playerClass = request('class'))
        {
            $cards = Card::where('playerClass', $playerClass)
                    ->where('state', 'like', 1)
                    ->get();
        } else {
            $cards = Card::where('state', 'like', 1)->get();
        }

        $categories = Card::selectRaw('playerClass')->get();

        return view ('index', compact('cards', 'categories'));
    }

    public function show(Card $card) //Card::find(wildcard) -> Card::find(wildcard)
    {
        return view('cards.show', compact('card'));
    }

    //TODO: Find out how algolia and scout works in this project
    public function search(Request $request)
    {
        $request->validate(['query' => 'string']);

        $keyword = $request->input('query');

        $cards = Card::search($keyword)
                    ->where('state', 1)
                    ->get();

        $categories = Card::selectRaw('playerClass')->get();

        return view('index', compact('cards', 'categories'));
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store(StoreCard $request)
    {
        //validated gives the validated data from the request
        Card::create($request->validated());

        return redirect('/admin');
    }

    public function edit(Card $card)
    {
        return view('cards.edit', compact('card'));
    }

    public function update(StoreCard $request, Card $card)
    {
        //validated gives the validated data from the request
        $card->update($request->validated());

        return back();
    }

    public function delete(Card $card)
    {
        $card->delete();

        return back();
    }

    public function state(Request $request)
    {
        $request->validate(['card' => 'required|int']);

        $input = $request->input('card');

        $card = Card::find($input);

        $card->changeState($card);

        return back();
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