@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">Admin dashboard</div>
                    <div class="panel-body">
                        @include('layouts.success')

                        {{--Create button--}}
                        <div>
                            <a href="{{ route('create') }}">
                                <button class="btn btn-default" type="button">Create</button>
                            </a>
                        </div>

                    </div>
                </div>

                {{--All cards--}}
                <div class="panel panel-default">
                    <div class="panel-heading">All cards</div>
                    <div class="panel-body">

                        @foreach($cards as $card)
                            <div>
                                <a href="{{ route('show', ['card' => $card->id]) }}">
                                    <img src="{{ $card->img }}" alt="">
                                </a>

                                {{--TODO: Active/unactive button maken--}}
                                {{--<a href="{{ route('state', ['card' => $card->id]) }}">--}}
                                    {{--<input type="checkbox" {{ $card->state }} data-toggle="toggle">--}}
                                {{--</a>--}}

                                <form id="form" action="{{ route('state', ['card' => $card->id]) }}" >
                                    <input type="checkbox" {{ $card->state }} data-toggle="toggle" onclick="this.form.submit();" id="check">

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                                {{--<script>--}}
                                    {{--$("#check").click(function(){--}}
                                        {{--$("#form").submit();--}}
                                    {{--});--}}
                                {{--</script>--}}

                                {{--Edit button--}}
                                <a href="{{ route('edit', ['card' => $card->id]) }}">
                                    <button class="btn btn-primary" type="button">Edit</button>
                                </a>

                                {{--Delete button--}}
                                <a href="{{ route('delete', ['card' => $card->id]) }}">
                                    <button class="btn btn-danger" type="button">Delete</button>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

        </div>
    </div>
</div>
@endsection