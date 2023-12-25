<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function dashboard()
    {
        $todayTrips = Trip::whereDate('date', today())->count();
        $totalTrips = Trip::count();
        $totalSoldTickets = Ticket::count();

        return view('dashboard.index', compact('todayTrips', 'totalTrips', 'totalSoldTickets'));
    }
}
