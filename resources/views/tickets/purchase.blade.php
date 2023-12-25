@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Purchase Ticket</h1>

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

        <form action="{{ route('ticket.purchase') }}" method="post">
            @csrf

            <!--form fields-->
            <div class="mb-3">
                <label for="trip">Select Trip</label>
                <select class="form-select" id="trip" name="trip" required>
                    {{-- Loop through trips and display options --}}
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}">{{ $trip->from }} to {{ $trip->to }} - {{ $trip->date }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="seat">Select Seat</label>
                <select class="form-select" id="seat" name="seat" required>
                    {{-- Loop through available seats and display options --}}
                    @foreach($availableSeats as $seat)
                        <option value="{{ $seat }}">{{ $seat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Purchase Ticket</button>
        </form>
    </div>
@endsection
