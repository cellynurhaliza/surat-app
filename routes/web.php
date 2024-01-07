<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\LetterController;

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

Route::middleware('guest')->group(function(){
    Route::get('/', function(){
        return view('login');
    })->name("login");
    Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::post('/login', [UserController::class, 'loginAuth'])->name('login');

Route::middleware('IsLogin')->group(function(){
    // Route::get('/logout', [UserController::class, 'logout'])->name['logout'];
    Route::get('/home', function(){
        return view('home');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');

// Route::middleware(['IsStaff', 'IsLogin'])->group(function(){
Route::prefix('/user')->name('user.')->group(function() {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('/guru')->name('guru.')->group(function() {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
});

    Route::prefix('/order')->name('order.')->group(function() {
       Route::prefix('/staff')->name('staff.')->group(function() {
        Route::get('/index', [OrderController::class, 'StaffIndex'])->name('index');
        Route::get('/create', [OrderController::class, 'StaffCreate'])->name('create');  
        Route::post('/store', [OrderController::class, 'StaffStore'])->name('store');
        Route::get('/edit/{id}', [OrderController::class, 'StaffEdit'])->name('edit');
        Route::patch('/update/{id}', [OrderController::class, 'StaffUpdate'])->name('update');
        // Route::get('/print/{id}', [OrderController::class, 'show'])->name('print');
        // Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
        // Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::delete('/delete/{id}' ,[OrderController::class, 'StaffDestroy'])->name('destroy');
       });
    });
    
    Route::prefix('/order')->name('order.')->group(function() {
        Route::prefix('/guru')->name('guru.')->group(function() {
        Route::get('/index', [OrderController::class, 'GuruIndex'])->name('index');
        Route::get('/create', [OrderController::class, 'GuruCreate'])->name('create');  
        Route::post('/store', [OrderController::class, 'GuruStore'])->name('store');
        Route::get('/edit/{id}', [OrderController::class, 'GuruEdit'])->name('edit');
        Route::patch('/update/{id}', [OrderController::class, 'GuruUpdate'])->name('update');
        // Route::get('/print/{id}', [OrderController::class, 'show'])->name('print');
        // Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
        // Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::delete('/delete/{id}' ,[OrderController::class, 'GuruDestroy'])->name('destroy');
    });
 });

Route::prefix('/order')->name('order.')->group(function() {
    Route::prefix('/letterType')->name('letterType.')->group(function(){
        Route::get('/index', [LetterTypeController::class, 'index'])->name('index');
        Route::get('/create', [LetterTypeController::class, 'create'])->name('create');  
        Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LetterTypeController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LetterTypeController::class, 'update'])->name('update');
        // Route::get('/print/{id}', [OrderController::class, 'show'])->name('print');
        Route::get('/download/{id}', [LetterTypeController::class, 'download'])->name('download');
        Route::get('/detail/{id}', [LetterTypeController::class, 'detail'])->name('detail');
        Route::delete('/delete/{id}' ,[LetterTypeController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('/order')->name('order.')->group(function() {
    Route::prefix('/letter')->name('letter.')->group(function(){
        Route::get('/index', [LetterController::class, 'index'])->name('index');
        Route::get('/create', [LetterController::class, 'create'])->name('create');  
        Route::post('/store', [LetterController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LetterController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LetterController::class, 'update'])->name('update');
        // Route::get('/print/{id}', [OrderController::class, 'show'])->name('print');
        // Route::get('/download/{id}', [LetterTypeController::class, 'download'])->name('download');
        // Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::delete('/delete/{id}' ,[LetterController::class, 'destroy'])->name('destroy');
    });
});
// });