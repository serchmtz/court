@extends('layouts.app')

@section('content')

<div class="container my-4">
    <h1 class="display-4">Torneos</h1>
    @foreach($torneos as $item)
    <div class = "container">
        <div class="container">
            <a href="{{ route('teams',$item) }}">
                <h4>{{ $item->name }}</h4>
                <p>{{ $item->date }}</p>
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection