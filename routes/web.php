<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupportChatController;


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

Route::get('/', function () {
    return view('index');
});

Route::post('/user_profile_st', [UserController::class,'saveProfileSt']) ->name('user.profile_st')->middleware('auth');
Route::post('/choose_st', [UserController::class,'chooseSt']) ->name('choose_st')->middleware('auth');


Route::get('/messenger',[MessengerController::class,'index'])->name('messenger')->middleware(['auth']);
Route::post('/save_msg',[MessengerController::class,'store'])->name('save_msg')->middleware(['auth']);
Route::post('/choose_user',[MessengerController::class,'choose'])->name('choose_user')->middleware(['auth']);
Route::post('/choose_me',[MessengerController::class,'choose'])->name('choose_me')->middleware(['auth']);
Route::post('/get_msg',[MessengerController::class,'getMsg'])->name('get_msg')->middleware(['auth']);
Route::post('/delete_msg',[MessengerController::class,'deleteMsg'])->name('delete_msg')->middleware(['auth']);
Route::get('/files/chat/{id}/{file}', [MessengerController::class,'downloadChatMsgFile']) ->name('download.file')->middleware('auth');

Route::post('/search_user',[UserController::class,'searchUser'])->name('search_user')->middleware(['auth']);

Route::get('/support_chat',[SupportChatController::class,'index'])->name('support_chat')->middleware(['auth']);

Route::get('/test',[UserController::class,'test'])->name('test');
Route::get('/show',function(){
    return view('show');
});

Route::get('/phpinfo',function(){
    phpinfo();
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
