<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\NoteController;


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
Route::get('/note', function () {
    return view('note_create');
});


Route::get('/scan', function () { return view('scan'); });
Route::post('/addpassword', [CardController::class, 'addpassword'])->name('addpassword');                  //returns the page

Route::post('/scan', [CardController::class, 'scan'])->name('scan');                                //returns the page
Route::post('/card/create', [CardController::class, 'create'])->name('createcard');                  //returns the page


//NOTE CONTROLLER
Route::post('/addnote',     [NoteController::class, 'create'    ])->name('addnote');                                //returns the page
Route::get ('/messages',    [NoteController::class, 'view'      ])->name('view');                                //returns the page

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
