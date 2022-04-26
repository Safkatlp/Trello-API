<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\List_Controller;
use App\Http\Controllers\Board_Controller;
use App\Http\Controllers\Card_Controller;
use App\Http\Controllers\Auth_Controller;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('',[Board_Controller::class,'index']);
Route::get('',[Auth_Controller::class,'index']);
//Route::get('/getToken',[Auth_Controller::class,'getToken'])->name('get_token');
Route::get('/trello',[Auth_Controller::class,"trello"])->name('trello');
Route::get('/trello/redirect',[Auth_Controller::class,"redirectToApp"])->name('trello.redirect');
Route::get('/boards',[Board_Controller::class,'index']);
Route::post('/boards',[Board_Controller::class,'store'])->name('create_board');
Route::put('/boards',[Board_Controller::class,'update'])->name('update_board');
Route::get('/boards/delete/{boardId}',[Board_Controller::class,'delete'])->name('delete_board');
Route::get('/cards/{listId}',[Card_Controller::class,'index']);
Route::get('/lists/{boardId}',[List_Controller::class,'index']);
Route::post('/lists',[List_Controller::class,'store'])->name('create_list');
Route::post('/cards',[Card_Controller::class,'store'])->name('create_card');