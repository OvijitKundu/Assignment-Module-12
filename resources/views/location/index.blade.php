@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Locations</h1>

        @foreach($locations as $location)
            <p>{{ $location->name }}</p>
        @endforeach

    </div>
@endsection
