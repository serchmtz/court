@extends('layouts.app')

@section('content')
<div class = "container">
    <h1 class="display-4">Jugadores de la federación</h1>
    @foreach($participante as $item)
    @if($federacion->id == $item->team_id)
    <div class = "container">
        <div class="container">
            <h4>Participante</h4>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection