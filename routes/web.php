<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('appointments.index');
})->middleware('auth');

Auth::routes();

Route::middleware('auth')->group(function (){
   Route::resource('doctors', 'DoctorController');
   Route::resource('patients', 'PatientController');
   Route::resource('appointments', 'AppointmentController');

});


Route::get('/home', 'HomeController@index')->name('home');
