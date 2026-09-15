<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

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
}