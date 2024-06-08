<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'number_of_people' => 'required|integer|min:1',
            'special_request' => 'nullable|string|max:1000',
        ]);

        // Create a new reservation
        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'number_of_people' => $request->number_of_people,
            'special_request' => $request->special_request,
        ]);

        // Redirect or provide feedback
        return redirect()->route('reservations.create')->with('success', 'Reservation created successfully.');
    }
}

