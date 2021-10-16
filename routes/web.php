<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FilesController;
use App\Models\Role;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/user', UserController::class);
    Route::post('/deactivate/{id}', [UserController::class, 'deactivate'])->name('deactivate');
    Route::post('/fileaprove/{id}', [FilesController::class, 'fileaprove'])->name('fileaprove');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/toPmu/{id}', [FilesController::class, 'toPmu'])->name('toPmu');
    Route::post('/toAccounting/{id}', [FilesController::class, 'toAccount'])->name('toAccounting');
    Route::resource('/files', FilesController::class);
    Route::resource('customers', CustomersController::class);
});





require __DIR__ . '/auth.php';
