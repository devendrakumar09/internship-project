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
    return view('welcome');
});


/**-----------DOCTOR Dash--------------- */
Route::group(['namespace' => 'Doctor', 'prefix'=>'dr', 'middleware'=>['auth','doctor'], ],function(){   
    Route::get('/dashboard','DashboardController@index')->name('doctor-dashboard');
});

/**-----------STAAFF Dash--------------- */
Route::group(['namespace' => 'Staff', 'prefix'=>'sf', 'middleware'=>['auth','staff'], ],function(){   
    
    Route::get('/dashboard','DashboardController@index')->name('staff-dashboard');
    
    Route::resource('/patient','PatientController');
}); 

/**-----------ADMIN Dash--------------- */
Route::group(['namespace' => 'Admin', 'prefix'=>'admin', 'middleware'=>['auth','admin'], ],function(){   
    Route::get('/dashboard','DashboardController@index')->name('admin-dashboard');

    Route::resource('/branch','BranchController');
    Route::resource('/doctor','DoctorController');
    Route::resource('/staff','StaffController');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
