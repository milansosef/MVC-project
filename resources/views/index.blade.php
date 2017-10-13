@extends('layouts.app')

@section('content')
    <div class="container">
        {{--TODO: Make searchbar work--}}
        {{--<div class="searchbar">--}}
            {{--<form method="GET" action="{{ route('search') }}">--}}
                {{--{{ csrf_field() }}--}}

                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" name="request" placeholder="Search cards" required>--}}
                {{--</div>--}}

                {{--<button type="submit" class="btn btn-default">Search</button>--}}
            {{--</form>--}}
        {{--</div>--}}

        <ais-index app-id="{{ config('scout.algolia.id') }}"
                   api-key="{{ env('ALGOLIA_SEARCH') }}"
                   index-name="cards">

            <ais-input placeholder="Search cards..."></ais-input>

            <ais-results>
                <template scope="{ result }">
                    <div>
                        <a :href="'/cards/' + result.id">
                            <img :src="result.img" alt="">
                        </a>
                        <h1>@{{ result.name }}</h1>
                    </div>
                </template>

            </ais-results>

        </ais-index>

        {{--All cards--}}
        {{--<div>--}}
            {{--@foreach($cards as $card)--}}
                {{--<a href="{{ route('show', ['card' => $card->id]) }}">--}}
                    {{--<img src="{{ $card->img }}" alt="">--}}
                {{--</a>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    </div>
@endsection