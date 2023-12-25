@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Create Trip</h1>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('trips.store') }}" method="post">
            @csrf

            <!--trip creation form-->
            <div class="mb-3">
                <label for="from">From</label>
                <input type="text" class="form-control" id="from" name="from" required>
            </div>

            <div class="mb-3">
                <label for="to">To</label>
                <input type="text" class="form-control" id="to" name="to" required>
            </div>

            <div class="mb-3">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Trip</button>
        </form>
    </div>
@endsection
