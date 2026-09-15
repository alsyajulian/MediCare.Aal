<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();

        return view(
            'admin.departments.index', //view ini akan menampilkan daftar departemen yang ada
            compact('departments')
        );
    }

    public function create()
    {
        return view('admin.departments.create'); //ini view untuk menampilkan tambah departemen baru
    }

    public function store(Request $request) //--> ini method untuk menyimpan data departemen baru ke database
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', //--> validasi nama departemen harus diisi oleh admin
            'description' => 'nullable|string',  //--> validasi deskripsi departemen boleh kosong (karna ada nya nullable)
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', //--> validasi gambar departemen boleh kosong (karna ada nya nullable)
        ]);

        if ($request->hasFile('image')) { //--> kalo admin mengupload gambar departemen, maka akan tersimpan di folder storage/app/public/departments
            $validated['image'] = $request->file('image')->store(
                'departments', //
                'public' //--> ini artinya gambar akan disimpan di folder storage/app/public/departments
            );
        }

        Department::create($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Departemen berhasil ditambahkan.'); //tanda klo departemen berhasil ditambahkan
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department')); //ini view untuk menampilkan edit departemen yang sudah ada
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {

            if ($department->image) {
                Storage::disk('public')->delete($department->image);
            }

            $validated['image'] = $request->file('image')->store(
                'departments',
                'public'
            );
        }

        $department->update($validated);

        return redirect()
            ->route('admin.departments.index')
            ->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Department $department)
    {

        if ($department->image) {
            Storage::disk('public')->delete($department->image); //--> ini artinya klo departemen dihapus, maka gambar departemen juga akan ikut terhapus dari folder storage/app/public/departments
        }

        $department->delete();

        return redirect()
            ->route('admin.departments.index') //tombol nya ada di view ini akan menampilkan daftar departemen yang ada
            ->with('success', 'Departemen berhasil dihapus.');
    }
}