<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;


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
})-> name('welcome');

Route::get('login', function() {
    return view('login');
})-> name('login');

Route::get('sign-in-google',[UserController::class, 'google']) -> name ('google-login');
Route::get('auth/google/callback',[UserController::class, 'callbackAuth']) -> name ('google-callback');
Route::get('logout', [UserController::class, 'logout']) -> name('google-logout');


Route::middleware(['auth']) -> group(function(){
    Route::post('checkout/{camp}', [CheckoutController::class, 'store']) -> name ('checkout-store');
Route::get('checkout/success', [CheckoutController::class, 'success']) -> name ('checkout-success');
Route::get('checkout/{camp:slug}', [CheckoutController::class, 'create']) -> name ('checkout-create');

Route::get('dashboard', [HomeController::class, 'dashboard']) -> name('dashboard');
});


require __DIR__.'/auth.php';
