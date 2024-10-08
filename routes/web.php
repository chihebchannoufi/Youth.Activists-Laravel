<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\InscriController;
use App\Http\Controllers\EventController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//pour ajouter un membre
Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
Route::get('/admin/users/home', [UserController::class, 'home'])->middleware(['auth','admin'])->name('admin.users.home');
Route::get('/admin/users/create', [UserController::class, 'create'])->middleware(['auth','admin'])->name('admin.users.create');
Route::post('/admin/users.store', [UserController::class, 'store'])->middleware(['auth','admin'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->middleware(['auth','admin'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->middleware(['auth','admin'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->middleware(['auth','admin'])->name('admin.users.destroy');

//pour une formation
Route::get('admin/formation',[FormationController::class,'index'])->middleware(['auth','admin'])->name('admin.formation');
Route::get('admin/formation/create', [FormationController::class, 'create'])->middleware(['auth','admin'])->name('admin.formation.create');
Route::post('admin/users', [FormationController::class, 'store'])->middleware(['auth','admin'])->name('admin.formation.store');
Route::get('admin/formation/{id}/edit', [FormationController::class, 'edit'])->middleware(['auth','admin'])->name('admin.formation.edit');
Route::put('/admin/formation/{id}', [FormationController::class, 'update'])->middleware(['auth','admin'])->name('admin.formation.update');
Route::delete('/admin/formation/{formation}', [FormationController::class, 'destroy'])->middleware(['auth','admin'])->name('admin.formation.destroy');

Route::get('membre/list',[MembreController::class,'index'])->name('membre.list');
Route::get('membre/formation',[MembreController::class,'formation'])->name('membre.formation');

Route::get('/inscription', [FrontController::class, 'index'])->name('inscription');
Route::get('/remerciment', [FrontController::class, 'res'])->name('remerciment');
Route::post('/store/message', [FrontController::class, 'store'])->name('message.store');

Route::post('/store/inscription', [InscriController::class, 'store'])->name('inscription.store');

Route::get('/message', [HomeController::class, 'affiche'])->middleware(['auth','admin'])->name('messages.Home');
Route::get('/list/inscription', [HomeController::class, 'affiche_inscriptions'])->middleware(['auth','admin'])->name('messages.inscription');

Route::get('membre/events',[EventController::class,'index'])->name('membre.events');
Route::get('create/events', [EventController::class, 'create'])->name('events.create');
Route::post('store/events', [EventController::class, 'store'])->name('events.store');

Route::get('events/list', [HomeController::class, 'events'])->middleware(['auth','admin'])->name('events.list');



