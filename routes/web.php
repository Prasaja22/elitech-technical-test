<?php

use App\Livewire\Archive;
use App\Livewire\Feed;
use App\Livewire\Login;
use App\Livewire\Logout as LivewireLogout;
use App\Livewire\Profile;
use App\Livewire\ProfileDetail;
use App\Livewire\Register;
use App\Livewire\Uploads;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('v1')->group(function (){
    Route::get('/', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');

    Route::get('/feed', Feed::class)->name('feed')->middleware('auth');
    Route::get('/profile/{id}', Profile::class)->name('profile')->middleware('auth');
    Route::get('/profile-detail', ProfileDetail::class)->name('profile-detail')->middleware('auth');

    Route::get('/post', Uploads::class)->name('post');
    Route::get('/archive', Archive::class)->name('archive');
});

