@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6">
            <form method="POST" action="{{ route('store') }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="cardset">Cardset:</label>
                    <input type="text" class="form-control" id="cardset" name="cardset" value="{{ old('cardset') }}" required>
                </div>

                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" required>
                </div>

                <div class="form-group">
                    <label for="rarity">Rarity:</label>
                    <input type="text" class="form-control" id="rarity" name="rarity" value="{{ old('rarity') }}" required>
                </div>

                <div class="form-group">
                    <label for="type">Cost:</label>
                    <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" required>
                </div>

                <div class="form-group">
                    <label for="attack">Attack:</label>
                    <input type="text" class="form-control" id="attack" name="attack" value="{{ old('attack') }}">
                </div>

                <div class="form-group">
                    <label for="health">Health:</label>
                    <input type="text" class="form-control" id="health" name="health" value="{{ old('health') }}">
                </div>

                <div class="form-group">
                    <label for="playerclass">Player class:</label>
                    <input type="text" class="form-control" id="playerclass" name="playerclass" value="{{ old('playerclass') }}" required>
                </div>

                <div class="form-group">
                    <label for="img">Img url:</label>
                    <input type="text" class="form-control" id="img" name="img" value="{{ old('img') }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create card</button>
                </div>
            </form>

            @include('layouts.errors')

        </div>
    </div>
@endsection