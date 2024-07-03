<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Affiliate\AffiliatePage;
use App\Livewire\Affiliate\AffiliateGroupPage;
use App\Livewire\ConfirmAlert;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', AffiliatePage::class);
Route::get('/affiliate-groups', AffiliateGroupPage::class);
Route::get('/test', ConfirmAlert::class);
