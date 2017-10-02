@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{ $card->name }}</h1>
        <img src="{{ $card->img }}" alt="">

        <ul>
            <li>Type: {{ $card->type}}</li>
            <li>Rarity: {{ $card->rarity }}</li>
            <li>Cardset: {{ $card->cardset }}</li>
            <li>Player Class: {{ $card->playerClass }}</li>
        </ul>

        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach($card->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->user->name }} on
                            {{ $comment->created_at->diffForHumans() }}: &nbsp;
                        </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>

        </div>
        {{--@auth--}}
        <hr>

        <div class="card">
            <div class="card-block">
                <form method="POST" action="/cards/{{ $card->id }}/comments">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" placeholder="Write a comment here" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>

                </form>
            </div>
        </div>
        {{--@endauth--}}
    </div>
@endsection