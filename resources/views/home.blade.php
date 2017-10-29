@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @include('layouts.success')

                    {{--Dust--}}
                    <form method="POST" action="{{ route('dust') }}">
                        <div class="form-inline">
                            {{ csrf_field() }}

                            <label for="dust">Dust: {{ Auth::user()->dust }}</label>
                            <input type="number" class="form-control" id="dust" name="dust" placeholder="Type in the new value" required>

                            <button type="submit" class="btn btn-default">Update dust</button>
                        </div>
                    </form>

                    @include('layouts.errors')
                </div>
            </div>

            {{--Wish list cards--}}
            <div class="panel panel-default">
                <div class="panel-heading">Card wishlist</div>
                <div class="panel-body">

                    @php
                        $dustCount = 0;
                        $userDust = Auth::user()->dust;
                        $totalDustNeeded = 0;
                    @endphp

                    @foreach($cards->cards as $card)
                        @php
                            $dustCount+= $card->craftingCost;

                            if ($dustCount - $userDust < 1){
                                $totalDustNeeded = 0;
                            } else {
                                $totalDustNeeded =  $dustCount - $userDust;
                            }
                        @endphp
                        <div>
                            <a href="{{ route('show', ['card' => $card->id]) }}">
                                <img src="{{ $card->img }}" alt="">
                            </a>
                            {{--<p> {{ $card->name }} {{ $card->craftingCost }}</p>--}}
                            <p> {{ $card->name }} {{ $card->craftingCost }}</p>

                            <form method="POST" action="{{ route('removefromwishlist', ['card' => $card->id]) }}">
                                {{csrf_field()}}

                                <button type="submit" class="btn btn-primary">Remove from wishlist</button>
                            </form>
                        </div>
                    @endforeach

                    <p>Crafting cost: {{ $dustCount }}</p>
                    <p>Total dust needed: {{ $totalDustNeeded }}</p>

                </div>
            </div>

            {{--All cards--}}
            <div class="panel panel-default">
                <div class="panel-heading">All cards</div>
                <div class="panel-body">

                    @foreach($allCards as $card)
                        <div>
                            <a href="{{ route('show', ['card' => $card->id]) }}">
                                <img src="{{ $card->img }}" alt="">
                            </a>

                            {{--send $card->id to wishlist function--}}
                            <form method="POST" action="{{ route('addtowishlist', ['card' => $card->id]) }}">
                                {{csrf_field()}}

                                <button type="submit" class="btn btn-primary">Add to wishlist</button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
