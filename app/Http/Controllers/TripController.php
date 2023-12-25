<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'date' => 'required|date',
        ]);

        // Create a new trip
        Trip::create([
            'from' => $request->from,
            'to' => $request->to,
            'date' => $request->date,
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
    }

}
