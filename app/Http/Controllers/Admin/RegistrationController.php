<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with([
            'patient',
            'doctor.department',
        ])
        ->latest()
        ->get();

        return view('admin.registrations.index', compact('registrations'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $registration->status = $request->status;
        $registration->save();

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

}

    
