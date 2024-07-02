<?php


use App\Livewire\AffiliateForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\AffiliateGroupForm;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', AffiliateForm::class);
Route::get('/affiliate-groups', AffiliateGroupForm::class);