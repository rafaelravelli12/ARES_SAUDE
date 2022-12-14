<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use Auth;


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

Route::get('/','FrontendController@index');

Route::get('/new-appointment/{doctorId}/{date}','FrontendController@show')->name('create.appointment');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard','DashboardController@index');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>['auth','patient']],function(){

    Route::post('/book/appointment','FrontendController@store')->name('booking.appointment');

    Route::get('/my-booking','FrontendController@mybookings')->name('my.booking');

    Route::get('/user-profile','ProfileController@index');

    Route::post('/profile','ProfileController@store')->name('profile.store');

    Route::post('/profile-pic','ProfileController@profilePic')->name('profile.pic');

});

Route::group(['middleware'=>['auth','admin']],function(){

    Route::resource('doctor', 'DoctorController');

    Route::get('/patients',"PatientlistController@index")->name('patient');

    Route::get('/patients/all',"PatientlistController@allTimeAppointment")->name('all.appointmens');

    Route::get('/status/update/{id}',"PatientlistController@toggleStatus")->name('update.status');

});

Route::group(['middleware'=>['auth','doctor']],function(){

    Route::resource('appointment','AppointmentController');

    Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');
    
    Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');

    Route::get('patient-today','PrescriptionController@index')->name('patients.today');

    Route::post('/prescriptions','PrescriptionController@store')->name('prescription');

    //Route::post('/prescription/{userId}/{date}','PrescriptionController@store')->name('prescription.show');
});
