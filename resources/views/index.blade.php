@extends('layouts.app')

@section('content')
    <div class="container">
        {{--TODO: Searchbar laten werken--}}
        <div class="searchbar">
            <form method=POST"" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="" placeholder="Search" required>
                </div>

                <button type="submit" class="btn btn-default">Update dust</button>
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