<?php

use App\ANP;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerController;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/',
        function () {
            // return Inertia::render('Welcome', [
            //     'canLogin' => Route::has('login'),
            //     'canRegister' => Route::has('register'),
            //     'laravelVersion' => Application::VERSION,
            //     'phpVersion' => PHP_VERSION,
            // ]);

            return redirect(route('dashboard'));
        }
    );

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [EmployerController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/new', [EmployerController::class, 'create'])->name('dashboard.new');
    Route::post('/dashboard/new', [EmployerController::class, 'store'])->name('dashboard.new');
    Route::get('/dashboard/{id}', [EmployerController::class, 'edit'])->name('dashboard.edit');
    Route::post('/dashboard/{id}', [EmployerController::class, 'update'])->name('dashboard.edit');
    Route::delete('/dashboard/{id}', [EmployerController::class, 'destroy'])->name('dashboard.delete');

    Route::get(
        '/employe',
        function (Request $request) {
            return Inertia::render('Employer/FormWP', [
                'title' => 'WP Karyawan',
                'employers' => Employer::selectRaw('nama, kinerja, ketepatan_waktu, komunikasi, kreatifitas, kehadiran')->orderBy('created_at', 'desc')->get(),
                'status' => session('status'),
            ]);
        }
    )->name('employe');

});

require __DIR__ . '/auth.php';
