<?php

use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//NOTES ROUTES
Route::view('notes', 'notes.index')
    ->middleware(['auth'])
    ->name('notes.index');

Route::view('notes/create', 'notes.create')
    ->middleware(['auth'])
    ->name('notes.create');

Volt::route('notes/{note}/edit', 'notes.edit-note')
    ->middleware(['auth'])
    ->name('notes.edit');



Route::get('notes/{note}', function (Note $note) {
    if (!$note->is_published) {
        abort(403, "Not is not published yet.");
    }
    $user = $note->user;

    return view(
        'notes.show',
        [
            'note' => $note,
            'user' => $user
        ]
    );
})->name('notes.show');

// Example routes
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/terms-of-service', 'terms-of-service')->name('terms-of-service');
Route::view('/contact', 'contact')->name('contact');


require __DIR__ . '/auth.php';
