<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Card;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //All cards
        $allCards = Card::where('state', 'like', 1)->get();


        //TODO: Find out what Auth is/does, how is it different from a model?
        //Only the cards from the user

        $user = Auth::user();

        //Lazy eager loading
        $cards = $user->load(['cards' => function($query)
        {
            $query->where('state', 'like', 1);
        }]);

        //Eager loading
//        $cards = Auth::user()
//                ->with('cards')
//                ->where('state', 'like', 1)
//                ->get();

//        $cards = Auth::user()->with(['cards' => function($query)
//        {
//            $query->where('state', 'like', 1);
//
//        }])->get();

        return view('home', compact(['cards', 'allCards']));
    }

    public function dust(Request $request)
    {
        $request->validate(['dust' => 'required|integer']);

        $newDust = $request->input('dust');

        auth()->user()->updateDust($newDust);

        return redirect('/home');
    }
}
