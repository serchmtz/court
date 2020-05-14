@extends('layouts.app')

@section('content')
<div class = "container">
    <h1 class="display-4">Jugadores de la federación</h1>
    @foreach($participante as $item)
    <div class = "container">
        <div class="container">
            $id_team = {{ $item->team_id }};
            $id_player = {{$item->player_id}};
        </div>
    </div>
    @endforeach
</div>
@endsection