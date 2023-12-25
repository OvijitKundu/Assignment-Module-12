@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Seat Allocations</h1>

        @foreach($seatAllocations as $seatAllocation)
            <p>Trip: {{ $seatAllocation->trip_id }}, Seat: {{ $seatAllocation->seat_number }}</p>
        @endforeach

    </div>
@endsection
