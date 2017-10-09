@extends('layouts.app')

@section('content')
    <div class="container">
        {{--TODO: Make searchbar work--}}
        <div class="searchbar">
            <form method="POST" action="{{ route('search') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search" required>
                </div>

                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>

        {{--All cards--}}
        <div>
            @foreach($cards as $card)
                <a href="{{ route('show', ['card' => $card->id]) }}">
                    <img src="{{ $card->img }}" alt="">
                </a>
            @endforeach
        </div>
    </div>
@endsection