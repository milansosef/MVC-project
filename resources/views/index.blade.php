@extends('layouts.app')

@section('content')
    <div class="container">
        {{--TODO: Make searchbar work--}}
        <div class="searchbar">
            <form method="GET" action="{{ route('search', ['query']) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" name="query" placeholder="Search cards">
                </div>

                {{--@php--}}
                {{--$classes = [--}}
                    {{--'class-1' => 'Neutral',--}}
                    {{--'class-2' => 'Druid',--}}
                    {{--'class-3' => 'Hunter',--}}
                    {{--'class-4' => 'Mage',--}}
                    {{--'class-5' => 'Paladin',--}}
                    {{--'class-6' => 'Priest',--}}
                    {{--'class-7' => 'Rogue',--}}
                    {{--'class-8' => 'Shaman',--}}
                    {{--'class-9' => 'Warlock',--}}
                    {{--'class-10' => 'Warrior',--}}
                {{--];--}}
                {{--@endphp--}}

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