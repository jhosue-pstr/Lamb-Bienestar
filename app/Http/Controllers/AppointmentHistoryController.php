<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentHistoryController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('student_id', Auth::id())
            ->orderBy('scheduled_date', 'desc')
            ->get();

        return view('appointments.history', compact('appointments'));
    }

    public function show(Appointment $appointment)
    {
        if ($appointment->student_id !== Auth::id()) {
            abort(403);
        }

        $view = $appointment->status === 'pending'
            ? 'appointments.show-pending'
            : 'appointments.show-attended';

        return view($view, compact('appointment'));
    }
}
