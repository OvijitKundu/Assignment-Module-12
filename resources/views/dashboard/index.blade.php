@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Dashboard</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <p>Total Trips: {{ $totalTrips }}</p>
        <p>Total Sold Tickets: {{ $totalSoldTickets }}</p>
        <p>Trips Today: {{ $todayTrips }}</p>

        

    </div>
@endsection
