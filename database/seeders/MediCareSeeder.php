<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Database\Seeder;

class MediCareSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // DEPARTMENTS
        // =========================

        $internalMedicine = Department::create([
            'name' => 'Penyakit Dalam',
            'description' => 'Pelayanan diagnosis dan pengobatan penyakit dalam.',
        ]);

        $pediatrics = Department::create([
            'name' => 'Anak',
            'description' => 'Pelayanan kesehatan dan tumbuh kembang anak.',
        ]);

        $cardiology = Department::create([
            'name' => 'Jantung',
            'description' => 'Pelayanan pemeriksaan dan perawatan kesehatan jantung.',
        ]);


        // =========================
        // DOCTORS
        // =========================

        $doctor1 = Doctor::create([
            'department_id' => $internalMedicine->id,
            'name' => 'dr. Andi Pratama',
            'specialization' => 'Spesialis Penyakit Dalam',
            'photo' => null,
            'description' => 'Dokter spesialis penyakit dalam dengan pengalaman dalam menangani berbagai kondisi kesehatan orang dewasa.',
        ]);

        $doctor2 = Doctor::create([
            'department_id' => $pediatrics->id,
            'name' => 'dr. Sinta Maharani',
            'specialization' => 'Spesialis Anak',
            'photo' => null,
            'description' => 'Dokter spesialis anak yang berfokus pada kesehatan dan tumbuh kembang anak.',
        ]);

        $doctor3 = Doctor::create([
            'department_id' => $cardiology->id,
            'name' => 'dr. Budi Santoso',
            'specialization' => 'Spesialis Jantung',
            'photo' => null,
            'description' => 'Dokter spesialis jantung dan pembuluh darah.',
        ]);


        // =========================
        // DOCTOR SCHEDULES
        // =========================

        DoctorSchedule::create([
            'doctor_id' => $doctor1->id,
            'day' => 'Senin',
            'start_time' => '08:00',
            'end_time' => '12:00',
        ]);

        DoctorSchedule::create([
            'doctor_id' => $doctor1->id,
            'day' => 'Rabu',
            'start_time' => '13:00',
            'end_time' => '16:00',
        ]);


        DoctorSchedule::create([
            'doctor_id' => $doctor2->id,
            'day' => 'Selasa',
            'start_time' => '09:00',
            'end_time' => '13:00',
        ]);

        DoctorSchedule::create([
            'doctor_id' => $doctor2->id,
            'day' => 'Kamis',
            'start_time' => '13:00',
            'end_time' => '16:00',
        ]);


        DoctorSchedule::create([
            'doctor_id' => $doctor3->id,
            'day' => 'Senin',
            'start_time' => '13:00',
            'end_time' => '16:00',
        ]);

        DoctorSchedule::create([
            'doctor_id' => $doctor3->id,
            'day' => 'Jumat',
            'start_time' => '08:00',
            'end_time' => '12:00',
        ]);
    }
}