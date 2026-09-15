<?php

namespace App\Http\Controllers\Admin; //menjadi remote kontrol pintar berbentuk objek PHP yang bertugas mengatur alur kerja dari laci-laci yang sudah dibuat oleh Migration

use App\Http\Controllers\Controller;
use App\Models\Doctor;    //Di sini dia memanggil Model Doctor dan Model Department agar nanti di bawah dia bisa menyuruh-nyuruh mereka untuk mengambil data dari database.
use App\Models\Department;
use Illuminate\Http\Request;  

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('department')
            ->latest()
            ->get();

        return view('admin.doctors.index', compact('doctors')); //view ini akan menampilkan daftar dokter beserta departemennya
    }

    public function create()
    {
        $departments = Department::orderBy('name')->get();

        return view('admin.doctors.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'specialization' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('doctors', 'public');
        }

        Doctor::create($validated);

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Dokter berhasil ditambahkan.');
    }


    public function edit(Doctor $doctor)
    {
        $departments = Department::orderBy('name')->get();

        return view('admin.doctors.edit', compact('doctor', 'departments'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'specialization' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('doctors', 'public');
        }

        $doctor->update($validated);

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Dokter berhasil dihapus.');
    }
}