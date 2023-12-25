<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class TicketController extends Controller
{
    public function purchase(Request $request)
{
    // Validate the form data
    $request->validate([
        'trip' => 'required|exists:trips,id',
        'seat' => 'required|integer',
    ]);

    // Find an available seat for the specified trip
    $seatAllocation = SeatAllocation::where('trip_id', $request->trip)
        ->where('seat_number', $request->seat)
        ->whereNull('ticket_id')
        ->first();

    if ($seatAllocation) {
        // Create a new ticket
        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'trip_id' => $request->trip,
            'seat_number' => $request->seat,
        ]);

        // Update the seat allocation with the ticket information
        $seatAllocation->update(['ticket_id' => $ticket->id]);

        return redirect()->route('dashboard')->with('success', 'Ticket purchased successfully');
    }

    // Handle case when the seat is not available
    return redirect()->back()->with('error', 'Selected seat is not available');
}

private function getAvailableSeats($tripId)
{
    // Implement logic to get available seats for the specified trip
    $allocatedSeats = SeatAllocation::where('trip_id', $tripId)
        ->whereNotNull('ticket_id')
        ->pluck('seat_number');

    // Assuming there are 36 seats in total
    $allSeats = range(1, 36);

    // Calculate available seats by subtracting allocated seats
    $availableSeats = array_diff($allSeats, $allocatedSeats->toArray());

    return $availableSeats;
}

}
