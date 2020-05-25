@extends('layouts.app')

@section('content')
<div class = "container">
    <h1 class="display-4">Jugadores</h1>
    @foreach($federacion as $item)
    <div class = "container">
        <div class="container">
            <a href="{{ route('participants',$item) }}">
                <h4>{{ $item->name }}</h4>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection