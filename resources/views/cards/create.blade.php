@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6">
            <form method="POST" action="/cards">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="cardset">Cardset:</label>
                    <input type="text" class="form-control" id="cardset" name="cardset">
                </div>

                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" class="form-control" id="type" name="type">
                </div>

                <div class="form-group">
                    <label for="rarity">Rarity:</label>
                    <input type="text" class="form-control" id="rarity" name="rarity">
                </div>

                <div class="form-group">
                    <label for="type">Cost:</label>
                    <input type="text" class="form-control" id="cost" name="cost">
                </div>

                <div class="form-group">
                    <label for="attack">Attack:</label>
                    <input type="text" class="form-control" id="attack" name="attack">
                </div>

                <div class="form-group">
                    <label for="health">Health:</label>
                    <input type="text" class="form-control" id="health" name="health">
                </div>

                <div class="form-group">
                    <label for="playerclass">Player class:</label>
                    <input type="text" class="form-control" id="playerclass" name="playerclass">
                </div>

                <div class="form-group">
                    <label for="img">Img url:</label>
                    <input type="text" class="form-control" id="img" name="img">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection