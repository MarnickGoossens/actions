<?php

use App\Livewire\Admin\ManageQuestions;
use App\Livewire\Owner\Locations;
use App\Livewire\Admin\ManageLessons;
use App\Livewire\Admin\ManagePayments;
use App\Livewire\Admin\ManageUsers;
use App\Livewire\Owner\ManageParameters;
use App\Livewire\Teacher\IndicateAttendance;
use App\Livewire\Teacher\ViewClass;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('courses', \App\Livewire\User\Courses::class)->name('courses');
Route::view('/', 'welcome')->name('home');
Route::view('under-construction', 'under-construction')->name('under-construction');
Route::get('owner/ManageParameters', ManageParameters::class)->name('owner/ManageParameters');
Route::get('admin/ManagePayments', ManagePayments::class)->name('admin/managePayments');

Route::get('teacher/viewClass', ViewClass::class)->name('teacher.viewClass');
Route::get('teacher/indicateAttendance', IndicateAttendance::class)->name('teacher.indicateAttendance');
Route::get('admin/ManageLessons', ManageLessons::class)->name('admin.ManageLessons');

Route::get('owner/locatiesBeheren', Locations::class)->name('owner/locatiesBeheren');

Route::view('admin-menu', 'admin-menu')->name('admin-menu');

Route::get('admin/ManageQuestions', ManageQuestions::class)->name('admin/ManageQuestions');


Route::get('manage-users', ManageUsers::class)->name('manage-users');
# All admin only pages ->
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
});

# All owner only pages ->
Route::middleware(['auth', 'owner'])->prefix('owner')->name('owner.')->group(function () {

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});
