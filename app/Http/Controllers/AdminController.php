<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Staff;

class AdminController extends Controller
{
    // Dashboard to main menu (Appointments)
    public function dashboard()
    {
        // 🎯 1. මෙතනට අපි 'latest()' කේතය එකතු කළා. 
        // දැන් අලුත්ම බුකින් සේරම ලස්සනට ලිස්ට් එකේ උඩටම එනවා!
        $appointments = Appointment::latest()->get();
        $staffMembers = Staff::all();
        
        return view('admin.dashboard', compact('appointments', 'staffMembers'));
    }

    // Appointment Status (Confirmed/Completed/Cancelled) 
    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment status updated successfully!');
    }

    // Clear all customer appointments
    public function clearCustomers()
    {
        $count = Appointment::count();
        if ($count > 0) {
            Appointment::query()->delete();
        }

        return redirect()->back()->with('success', $count > 0 ? "Cleared {$count} customer record(s)." : 'No customer records found.');
    }

    // Delete one appointment record
    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Customer booking removed successfully.');
    }

    // Staff (Stylist) 
    public function addStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        Staff::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
        ]);

        return redirect()->back()->with('success', 'Staff member added successfully!');
    }

    // Appointment Store Function (එකම වෙලාවට බුකින් වැටීම වැළැක්වීම සහිතව)
    public function store(Request $request)
    {
        // 1. Form එකෙන් එන ඩේටා ටික Validate කරගන්නවා
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone'         => 'required|string|max:15',
            'booking_date'  => 'required|date',
            'booking_time'  => 'required|string',
        ]);

        // 🎯 2. එකම දවසේ, එකම වෙලාවේ වෙනත් බුකින් එකක් තියෙනවාදැයි ඩේටාබේස් එකේ පරීක්ෂා කිරීම
        $isAlreadyBooked = Appointment::where('booking_date', $request->booking_date)
                                      ->where('booking_time', $request->booking_time)
                                      ->exists(); // බුකින් එකක් තිබේ නම් true වේ

        // ⚠️ 3. දැනටමත් බුකින් එකක් තිබේ නම්, Error එකක් සමඟ ආපසු හරවා යැවීම
        if ($isAlreadyBooked) {
            return redirect()->back()
                ->withInput() // කස්ටමර් පුරවපු විස්තර ටික ෆෝම් එකේම ඉතුරු කරනවා
                ->with('error', 'Sorry, this time slot is already booked! Please select another time.');
        }

        // 4. කිසිදු ගැටලුවක් නැතිනම් පමණක් ඩේටාබේස් එකට සේව් කිරීම
        Appointment::create([
            'customer_name' => $request->customer_name,
            'phone'         => $request->phone,
            'status'        => 'pending',
            'booking_date'  => $request->booking_date, 
            'booking_time'  => $request->booking_time,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
    }