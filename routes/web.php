<?php

use App\Http\Controllers\CreateContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\HomeController ;
use App\Http\Controllers\FriendsController;
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
    Route::post('/loadPosts', [ShowController::class, 'loadPosts'])->middleware('auth');


    Route::get('/profile/{userId}', [ShowController::class, 'ShowUserProfile'])->name('profile.edit')->middleware('auth');
    Route::get('/profile', [ShowController::class, 'ShowMyProfile'])->name('MyProfile.edit')->middleware('auth');

    Route::get('/friends', [FriendsController::class, 'ShowAllMyFriends'])->middleware('auth');
    Route::get('/friends/{userId}', [FriendsController::class, 'ShowAllFriends'])->name('showAllFriends')->middleware('auth');
    Route::post('/friend/send-request/{userId}', [FriendsController::class, 'sendRequest'])->name('sendFriendRequest')->middleware('auth');
    Route::post('/acceptApplicationRequest/{userId}', [FriendsController::class, 'acceptApplicationRequest'])->name('acceptApplicationRequest')->middleware('auth');
    Route::post('/rejectApplicationRequest/{userId}', [FriendsController::class, 'rejectApplicationRequest'])->name('rejectApplicationRequest')->middleware('auth');
    Route::post('/friend/reject/{requestId}', [FriendsController::class, 'deleteFriend'])->middleware('auth');


    Route::get('/chat/{userId}')->name('chat');


    Route::get('/create', [HomeController::class, 'create']);
    Route::get('/createFriend', [CreateContentController::class, 'createFriend']);
    Route::get('/createPosts/{id}', [CreateContentController::class, 'createPosts']);

require __DIR__.'/auth.php';
