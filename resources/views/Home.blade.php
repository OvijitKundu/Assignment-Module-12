@extends('Layout.app')

@section('content')
    @include('dashboard.index')
    @include('location.index')
    @include('seat_allocations.index')
    @include('tickets.purchase')
    @include('trips.create')
    @include('trips.index')
    @include('users.index') 
@endsection