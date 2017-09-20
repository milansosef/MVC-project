@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($cards as $card)
            <img src="{{$card}}" alt="">
        @endforeach
    </div>
@endsection