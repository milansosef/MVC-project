@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($cards as $card)
            <a href="/cards/{{ $card->id }}">
                <img src="{{ $card->img }}" alt="">
            </a>
        @endforeach
    </div>
@endsection