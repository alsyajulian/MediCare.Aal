<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Models\Doctor; //menaggil model Doctor untuk mengambil data dokter dari database
use App\Models\Department;
use App\Models\Article;
use App\Models\Service;
use App\Models\ContactMessage;
use App\Models\Registration;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\DoctorScheduleController as AdminDoctorScheduleController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



// =========================
// WEBSITE MEDICARE
// =========================

Route::get('/', function () {
    $doctors = Doctor::with(['department', 'schedules'])->get();

    $articles = Article::latest('published_at') //->mengambil data artikel terbaru dari database
        ->take(4)  //-> ini akan mengambil 4 data artikel terbaru
        ->get();

    $latestRegistrations = Registration::latest() //->mengambail data yang akan ditampilkan kehalaman home.blade.php
        ->take(5) //-> ini akan mengambil 5 data pendaftaran terbaru
        ->get();

    $galleries = Gallery::latest()
    ->take(4)  //-> ini akan mengambil 4 data galeri terbaru
    ->get();

    $departments = Department::latest()
        ->take(6) //-> ini akan mengambil 6 data departemen terbaru
        ->get();

    $services = Service::latest()
        ->take(6)  //-> ini akan mengambil 6 data layanan terbaru
        ->get();

     // Statistik dari database
    $doctorCount = Doctor::count();
    $departmentCount = Department::count();
    $serviceCount = Service::count();

    return view('home', compact(  //menampilkan data dokter, artikel, pendaftaran terbaru, galeri, departemen, layanan, dan statistik ke view home.blade.php
        'doctors',
        'articles',
        'galleries',
        'departments',
        'services',
        'doctorCount',
        'departmentCount',
        'serviceCount'
        ));

})->name('home');


Route::get('/tentang', function () {

    $doctorCount = Doctor::count();
    $departmentCount = Department::count();
    $serviceCount = Service::count();
    $patientCount = Registration::count();

    return view('about.index', compact(
        'doctorCount',
        'departmentCount',
        'serviceCount',
        'patientCount'
    ));

})->name('about');


// Jadwal Dokter

Route::get('/dokter/jadwal', function (Request $request) {

    $query = Doctor::with([
        'department',
        'schedules'
    ]);

    // Cari berdasarkan nama dokter
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter berdasarkan spesialisasi
    if ($request->filled('specialization')) {
        $query->where('specialization', $request->specialization);
    }

    // Filter berdasarkan hari
    if ($request->filled('day')) {
        $query->whereHas('schedules', function ($scheduleQuery) use ($request) {
            $scheduleQuery->where('day', $request->day);
        });
    }

    $doctors = $query->get();

    // Data untuk dropdown spesialisasi
    $specializations = Doctor::query()
        ->select('specialization')
        ->distinct()
        ->orderBy('specialization')
        ->pluck('specialization');

    return view('doctors-schedules.index', compact(
        'doctors',
        'specializations'
    ));

})->name('doctors.schedule');


// Pendaftaran Pasien
Route::get('/pendaftaran', [RegistrationController::class, 'create'])
    ->name('registration.create');

Route::post('/pendaftaran', [RegistrationController::class, 'store'])
    ->name('registration.store');

Route::get('/cek-pendaftaran', [RegistrationController::class, 'checkStatus'])
    ->name('registration.checkStatus');

Route::patch('/registrations/{registration}/status', [AdminRegistrationController::class, 'updateStatus'])
    ->name('admin.registrations.updateStatus');

Route::get('/pendaftaran/berhasil/{registration}', [RegistrationController::class, 'success'])
    ->name('registration.success');

// Departemen
Route::get('/departments', function () {

    $departments = Department::latest()->get();

    return view('departments.index', compact('departments'));

})->name('departments.index');

//gallery
Route::get('/galeri', function (Request $request) {

    $query = Gallery::latest();

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $galleries = $query->get();

    return view('gallery.index', compact('galleries'));

})->name('gallery.index');

// Layanan
Route::get('/layanan', function () {

    $services = Service::latest()->get();

    return view('services.index', compact('services'));

})->name('services.index');


// Artikel
Route::get('/artikel', function (Request $request) {

    // Ambil semua artikel untuk menghitung kategori
    $allArticles = Article::latest('published_at')->get();

    // Query artikel yang akan ditampilkan
    $query = Article::latest('published_at');

    // Filter berdasarkan kategori
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $articles = $query->get();

    // Ambil daftar kategori + jumlah artikelnya
    $categoryCounts = $allArticles
        ->groupBy('category')
        ->map(function ($category) {
            return $category->count();
        });

    return view('articles.index', compact(
        'articles',
        'categoryCounts'
    ));

})->name('articles.index');


Route::get('/artikel/{article}', function (Article $article) {

    return view('articles.show', compact('article'));

})->name('articles.show');


// Kontak
Route::get('/kontak', function () {
    return view('contact.index');
})->name('contact.index');

Route::post(
    '/kontak',
    [ContactController::class, 'store']
)->name('contact.store');


Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login');



// =========================
// ADMIN DASHBOARD
// =========================

Route::get('/dashboard', function () {

    $unreadMessages = ContactMessage::where('is_read', false)->count();

    $totalDoctors = Doctor::count();
    $totalDepartments = Department::count();
    $totalServices = Service::count();
    $totalArticles = Article::count();
    $galleryCount = Gallery::count();

    $latestMessages = ContactMessage::latest()
        ->take(5)
        ->get();

    $latestRegistrations = Registration::latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'unreadMessages',
        'totalDoctors',
        'totalDepartments',
        'totalServices',
        'totalArticles',
        'galleryCount',
        'latestMessages',
        'latestRegistrations'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/registrations', [AdminRegistrationController::class, 'index'])
        ->name('admin.registrations.index');



    Route::get('/doctors', [AdminDoctorController::class, 'index'])
        ->name('admin.doctors.index');

    Route::get('/doctors/create', [AdminDoctorController::class, 'create'])
        ->name('admin.doctors.create');

    Route::post('/doctors', [AdminDoctorController::class, 'store'])
        ->name('admin.doctors.store');

    Route::get('/doctors/{doctor}/edit', [AdminDoctorController::class, 'edit'])
    ->name('admin.doctors.edit');

    Route::put('/doctors/{doctor}', [AdminDoctorController::class, 'update'])
        ->name('admin.doctors.update');
        
    Route::delete('/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])
        ->name('admin.doctors.destroy');


    Route::get('/doctor-schedules', [AdminDoctorScheduleController::class, 'index'])
        ->name('admin.doctor-schedules.index');

    Route::get('/doctor-schedules/create', [AdminDoctorScheduleController::class, 'create'])
        ->name('admin.doctor-schedules.create');

    Route::get('/doctor-schedules/{doctorSchedule}/edit', [AdminDoctorScheduleController::class, 'edit'])
        ->name('admin.doctor-schedules.edit');

    Route::put('/doctor-schedules/{doctorSchedule}', [AdminDoctorScheduleController::class, 'update'])
        ->name('admin.doctor-schedules.update');

    Route::delete('/doctor-schedules/{doctorSchedule}', [AdminDoctorScheduleController::class, 'destroy'])
    ->name('admin.doctor-schedules.destroy');

    Route::post('/doctor-schedules', [AdminDoctorScheduleController::class, 'store'])
        ->name('admin.doctor-schedules.store');


    
    Route::get(
        '/departments',
        [DepartmentController::class, 'index']
    )->name('admin.departments.index');

    Route::get(
        '/departments/create',
        [DepartmentController::class, 'create']
    )->name('admin.departments.create');

    Route::post(
        '/departments',
        [DepartmentController::class, 'store']
    )->name('admin.departments.store');

    Route::get(
        '/departments/{department}/edit',
        [DepartmentController::class, 'edit']
    )->name('admin.departments.edit');

    Route::put(
        '/departments/{department}',
        [DepartmentController::class, 'update']
    )->name('admin.departments.update');

    Route::delete(
        '/departments/{department}',
        [DepartmentController::class, 'destroy']
    )->name('admin.departments.destroy');



    Route::get(
        '/services',
        [ServiceController::class, 'index']
    )->name('admin.services.index');

    Route::get('/services/create', [ServiceController::class, 'create'])
        ->name('admin.services.create');

    Route::post('/services', [ServiceController::class, 'store'])
        ->name('admin.services.store');

    Route::get(
        '/services/{service}/edit',
        [ServiceController::class, 'edit']
    )->name('admin.services.edit');

    Route::put(
        '/services/{service}',
        [ServiceController::class, 'update']
    )->name('admin.services.update');

    Route::delete(
        '/services/{service}',
        [ServiceController::class, 'destroy']
    )->name('admin.services.destroy');

    

    Route::get(
        '/articles',
        [ArticleController::class, 'index']
    )->name('admin.articles.index');

    Route::get(
        '/articles/create',
        [ArticleController::class, 'create']
    )->name('admin.articles.create');

    Route::post(
        '/articles',
        [ArticleController::class, 'store']
    )->name('admin.articles.store');

    Route::get(
        '/articles/{article}/edit',
        [ArticleController::class, 'edit']
    )->name('admin.articles.edit');

    Route::put(
        '/articles/{article}',
        [ArticleController::class, 'update']
    )->name('admin.articles.update');

    Route::delete(
        '/articles/{article}',
        [ArticleController::class, 'destroy']
    )->name('admin.articles.destroy');




    Route::get(
        '/contact-messages',
        [ContactMessageController::class, 'index']
    )->name('admin.contact-messages.index');

    Route::get(
        '/contact-messages/{contactMessage}',
        [ContactMessageController::class, 'show']
    )->name('admin.contact-messages.show');

    Route::delete(
        '/contact-messages/{contactMessage}',
        [ContactMessageController::class, 'destroy']
    )->name('admin.contact-messages.destroy');



    //gallery
    Route::resource('galleries', GalleryController::class)
        ->except(['show']);


});





// =========================
// PROFILE
// =========================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// =========================
// AUTHENTICATION BREEZE
// =========================

require __DIR__.'/auth.php';