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
    // return view('welcome');
    return view('scan');
});
Route::get('/note', function () {
    return view('note_create');
});


Route::get('/scan', function () { return view('scan'); });

//CARD CONTROLLER
Route::post('/addpassword',             [CardController::class, 'addpassword'           ])->name('addpassword');
Route::post('/scan',                    [CardController::class, 'scan'                  ])->name('scan');
Route::post('/card/create',             [CardController::class, 'create'                ])->name('createcard');


//NOTE CONTROLLER
Route::post('/addnote',                 [NoteController::class, 'create'                ])->name('addnote');
Route::get ('/notes',                   [NoteController::class, 'view'                  ])->name('view');
Route::get ('/unreadmessages_get',      [NoteController::class, 'unreadmessages_get'    ])->name('unreadmessages_get');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
