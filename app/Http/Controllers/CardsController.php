<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCard;
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
        $cards = Card::where('state', 'like', 'checked')->get();

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

    public function state(Card $card)
    {
        if ($card->state == 'checked')
        {
            $newState = '';
        }
        else {
            $newState = 'checked';
        }

        $card->state = $newState;
        $card->save();

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