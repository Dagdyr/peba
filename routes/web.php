<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [ShowController::class, 'ShowAllPosts'])->middleware('auth')->name('ShowAllPosts');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    Route::post('/updateAbout', [ProfileController::class, 'updateAbout'])->middleware('auth');
    Route::post('/updateName', [ProfileController::class,  'updateName'])->middleware('auth');
    Route::post('/updateImg', [ProfileController::class,  'updateImg'])->middleware('auth');

    Route::post('/addPost', [PostController::class,  'addPost'])->middleware('auth');
    Route::post('/deletePost', [PostController::class,  'deletePost'])->middleware('auth');
    Route::post('/editePost', [PostController::class,  'editePost'])->middleware('auth');
    Route::post('/showMyPosts', [PostController::class, 'showMyPosts'])->middleware('auth');


    Route::get('/profile/{userId}', [ShowController::class, 'ShowUserProfile'])->name('profile.edit')->middleware('auth');
    Route::get('/profile', [ShowController::class, 'ShowMyProfile'])->name('MyProfile.edit')->middleware('auth');


require __DIR__.'/auth.php';
