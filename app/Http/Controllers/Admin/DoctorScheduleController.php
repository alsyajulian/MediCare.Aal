<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function index()
    {
        $schedules = DoctorSchedule::with('doctor')
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('admin.doctor-schedules.index', compact('schedules'));
    }

    public function create()
    {
        $doctors = Doctor::orderBy('name')->get();

        return view('admin.doctor-schedules.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        DoctorSchedule::create($validated);

        return redirect()
            ->route('admin.doctor-schedules.index')
            ->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }

    public function edit(DoctorSchedule $doctorSchedule)
    {
        $doctors = Doctor::orderBy('name')->get();

        return view('admin.doctor-schedules.edit', compact(
            'doctorSchedule',
            'doctors'
        ));
    }

    public function update(Request $request, DoctorSchedule $doctorSchedule)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'day' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $doctorSchedule->update($validated);

        return redirect()
            ->route('admin.doctor-schedules.index')
            ->with('success', 'Jadwal dokter berhasil diperbarui.');
    }

    public function destroy(DoctorSchedule $doctorSchedule)
    {
        $doctorSchedule->delete();

        return redirect()
            ->route('admin.doctor-schedules.index')
            ->with('success', 'Jadwal dokter berhasil dihapus.');
    }

}