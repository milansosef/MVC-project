@extends('layouts.app')

@section('content')
    <div class="container">

        {{--Searchbar--}}
        <div class="searchbar">
            <form method="GET" action="{{ route('search', ['query']) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" name="query" placeholder="Search cards">
                </div>

                <button type="submit" class="btn btn-default">Filter</button>
            </form>
        </div>

        {{--Categories--}}
        <div>
            <h4>Categories</h4>

            @foreach($categories as $class)
                <li>
                    <a href="{{ route('category', ['class' => $class['playerClass']] ) }}">{{ $class['playerClass'] }}</a>
                </li>
            @endforeach
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