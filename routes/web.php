<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');


Route::middleware(['auth:sanctum', 'verified','admin'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified','teacher'])->get('/teacher/dashboard', function () {
    return view('teacherDashboard');
})->name('teacher.dashboard');