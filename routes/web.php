<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Tickets;
use App\Http\Livewire\ViewTicket;
use App\Http\Livewire\ManageTickets;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    if (Gate::denies('admin-rights')) {
        return redirect()->route('home');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ticket', Tickets::class)->name('ticket');
    Route::get('/ticket/{id}', ViewTicket::class)->name('ticket.response');

    Route::get('/manage-tickets', ManageTickets::class)->name('manage-tickets');
});

require __DIR__.'/auth.php';
