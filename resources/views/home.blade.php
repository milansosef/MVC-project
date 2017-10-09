@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">My collection</div>


                <div class="panel-body">
                    {{--Success message--}}
                    <div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    {{--Dust--}}
                    <div>
                        <form method="POST" action="{{ route('dust') }}">
                            <div class="form-inline">
                                {{ csrf_field() }}

                                <label for="dust">Dust: {{ Auth::user()->dust }}</label>
                                <input type="number" class="form-control" id="dust" name="dust" placeholder="Type in the new value" required>

                                <button type="submit" class="btn btn-default">Update dust</button>
                            </div>
                        </form>
                    </div>

                    @include('layouts.errors')

                    {{--Wish list cards--}}
                    <div>
                        @foreach($cards as $card)
                            <div>
                                <a href="{{ route('show', ['card' => $card->id]) }}">
                                    <img src="{{ $card->img }}" alt="">
                                </a>
                                <span> {{ $card->name }} {{ $card->cost }}</span>

                                <form method="POST" action="{{ route('removefromwishlist') }}">
                                    {{csrf_field()}}

                                    <input type="hidden" name="cardId" value="{{ $card->id }}">

                                    <button type="submit" class="btn btn-primary">Remove from wishlist</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                    <hr>
                    
                    {{--All cards--}}
                    <div>
                        <h3>All cards</h3>
                    </div>

                    <div>
                        @foreach($allCards as $card)
                            <div>
                                <a href="{{ route('show', ['card' => $card->id]) }}">
                                    <img src="{{ $card->img }}" alt="">
                                </a>

                                {{--send $card->id to wishlist function--}}
                                <form method="POST" action="{{ route('addtowishlist') }}">
                                    {{csrf_field()}}

                                    <input type="hidden" name="cardId" value="{{ $card->id }}">

                                    <button type="submit" class="btn btn-primary">Add to wishlist</button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
