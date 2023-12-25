@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Trips</h1>

        @foreach($trips as $trip)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">From: {{ $trip->from }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">To: {{ $trip->to }}</h6>
                    <p class="card-text">Date: {{ $trip->date }}</p>
                </div>
            </div>
        @endforeach

    </div>
@endsection
