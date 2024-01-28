<?php

use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[EventController::class,'index'])->name('event');
Route::post('/save-events',[EventController::class, 'save_events'])->name('saveEvents');
Route::get('delete-event/{id}', [EventController::class, 'delete_events'])->name('removeEvents');
Route::get('/update-event/{id}', [EventController::class, 'update_events'])->name('updateEvents');
Route::put('/save-update-events/{id}', [EventController::class, 'save_updated_events'])->name('saveUpdate');
