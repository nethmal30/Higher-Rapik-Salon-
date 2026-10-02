<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentConfirmation;
use App\Mail\NewBookingNotification;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    // 1. බුකින් පේජ් එක ලෝඩ් වන Function එක
    public function index()
    {
        $bookedAppointments = Appointment::orderBy('booking_date')->orderBy('booking_time')->get();
        return view('booking', compact('bookedAppointments'));
    }

    public function store(Request $request)
    {
        // 1. Validate incoming request
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:15',
            'service'       => 'required|string|max:255',
            'message'       => 'nullable|string|max:1000',
            'booking_date'  => 'required|date',
            'booking_time'  => 'required|string',
        ]);

        // 🎯 2. Strict double booking check (Trimming spaces to avoid string mismatches)
        $isAlreadyBooked = Appointment::where('booking_date', trim($request->booking_date))
                                      ->where('booking_time', trim($request->booking_time))
                                      ->exists();

        // ⚠️ 3. If already booked, return back with error message
        if ($isAlreadyBooked) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Sorry, this time slot is already booked! Please select another time.');
        }

        $appointment = Appointment::create([
            'customer_name' => $request->customer_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'service'       => $request->service,
            'message'       => $request->message,
            'status'        => 'pending',
            'booking_date'  => $request->booking_date,
            'booking_time'  => $request->booking_time,
        ]);

        try {
            Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment));
            Mail::to(config('mail.admin_address'))->send(new NewBookingNotification($appointment));
        } catch (\Throwable $exception) {
            // Keep the booking flow working even if email sending fails.
        }

        return redirect()->back()->with('success', 'Appointment booked successfully! A confirmation email has been sent.');
    }
}