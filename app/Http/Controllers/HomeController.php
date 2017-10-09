<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Card;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCards = Card::all();

//        Lazy or eager loaded ?
        $user = Auth::user();
        $cards = $user->cards;

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
