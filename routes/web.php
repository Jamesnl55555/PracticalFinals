<?php
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/',[GuestController::class, 'land']) ->name('land');
Route::get('/loginpage', [GuestController::class, 'loginpage'])->name('loginpage');
Route::get('/regpage', [GuestController::class, 'regpage'])->name('regpage');
Route::post('/login', [GuestController::class, 'login'])->name('login');
Route::post('/register', [GuestController::class, 'register'])->name('register');

Route::middleware('authentication')->group(function (){
    Route::get('/notes', [GuestController::class, 'notes'])->name('notes');
    Route::get('/logout', [GuestController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('dashboard');
    Route::get('/notes/ncreate', [GuestController::class, 'createNote'])->name('ncreate');
    Route::post('/notes/store', [GuestController::class, 'storeNote'])->name('nstore');
    Route::post('/notes/delete/{id}', [GuestController::class, 'deleteNote'])->name('ndelete');
    Route::get('/notes/edit/{id}', [GuestController::class, 'editNote'])->name('nedit');
    Route::get('/notes/view/{id}', [GuestController::class, 'viewNote'])->name('nview');
    Route::post('/notes/update/{id}', [GuestController::class, 'updateNote'])->name('nupdate');
});