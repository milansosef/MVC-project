@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar">
            <form method="GET" action="{{ route('search', ['query']) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" name="query" placeholder="Search cards">
                </div>

                {{--<fieldset>--}}
                    {{--<legend>Class</legend>--}}
                    {{--<div>--}}
                        {{--<ul>--}}
                            {{--@foreach($classes as $index => $class)--}}
                                {{--<li>--}}
                                    {{--<input type="checkbox" id="{{ $index }}" value="{{ $class }}">--}}
                                    {{--<label for="{{ $index }}">{{ $class }}</label>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</fieldset>--}}

                <button type="submit" class="btn btn-default">Filter</button>
            </form>
        </div>

        <div>
            <h4>Categories</h4>

            @foreach($categories as $class)
                <li>
                    <a href="/?class={{ $class['playerClass'] }}">{{ $class['playerClass'] }}</a>
                </li>
            @endforeach
        </div>

        {{--<ais-index app-id="{{ config('scout.algolia.id') }}"--}}
                   {{--api-key="{{ env('ALGOLIA_SEARCH') }}"--}}
                   {{--index-name="cards">--}}

            {{--<ais-input placeholder="Search cards..."></ais-input>--}}

            {{--<ais-results>--}}
                {{--<template scope="{ result }">--}}
                    {{--<div>--}}
                        {{--<a :href="'/cards/' + result.id">--}}
                            {{--<img :src="result.img" alt="">--}}
                        {{--</a>--}}
                        {{--<h1>@{{ result.name }}</h1>--}}
                    {{--</div>--}}
                {{--</template>--}}

            {{--</ais-results>--}}

        {{--</ais-index>--}}

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