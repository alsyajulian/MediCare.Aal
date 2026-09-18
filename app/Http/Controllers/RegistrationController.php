<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(Request $request)
    {
        $doctors = Doctor::with('department')
            ->orderBy('name')
            ->get();

        $selectedDoctor = null;

        if ($request->filled('doctor')) {
            $selectedDoctor = Doctor::with('department')
                ->find($request->doctor);
        }

        return view('registration.create', compact(
            'doctors',
            'selectedDoctor'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['nullable', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['required', 'in:L,P'],
            'address' => ['nullable', 'string'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'registration_date' => ['required', 'date'],
            'complaint' => ['nullable', 'string'],
        ]);

        $doctor = Doctor::with('schedules')->findOrFail(
            $validated['doctor_id']
        );

        $day = \Carbon\Carbon::parse(
            $validated['registration_date']
        )->locale('id')->dayName;

        $day = ucfirst($day);

        $hasSchedule = $doctor->schedules
            ->where('day', $day)
            ->isNotEmpty();

        if (!$hasSchedule) {
            return back()
                ->withInput()
                ->withErrors([
                    'registration_date' =>
                        'Dokter tidak memiliki jadwal praktik pada tanggal tersebut.'
                ]);
        }

        $patient = Patient::create([
            'name' => $validated['name'],
            'nik' => $validated['nik'] ?? null,
            'phone' => $validated['phone'],
            'birth_date' => $validated['birth_date'] ?? null,
            'gender' => $validated['gender'],
            'address' => $validated['address'] ?? null,
        ]);

        $registration = Registration::create([
            'patient_id' => $patient->id,
            'doctor_id' => $validated['doctor_id'],
            'registration_date' => $validated['registration_date'],
            'complaint' => $validated['complaint'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('registration.success', $registration->id);
    }

    public function success(Registration $registration)
    {
        $registration->load([
            'patient',
            'doctor.department',
        ]);

        return view('registration.success', compact('registration'));
    }

    public function checkStatus(Request $request)
    {
        $registration = null;

        if ($request->filled('registration_number') && $request->filled('phone')) {

            $id = str_replace('REG-', '', $request->registration_number);

            $registration = Registration::with([
                'patient',
                'doctor.department',
            ])
            ->where('id', $id)
            ->whereHas('patient', function ($query) use ($request) {
                $query->where('phone', $request->phone);
            })
            ->first();
        }

        return view('registration.check-status', compact('registration'));
    }
}