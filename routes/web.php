<?php

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
//     return view('login');
// });


Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@index');

Auth::routes([
    'register' => false,
    'reset' => false
  ]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    // admin access
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //admin profile
    Route::get('/admin-profile', 'AdminController@index')->name('admin.profile');
    Route::put('/admin-profile/update', 'AdminController@update')->name('admin.profile.update');

    //manage employees - admin dashboard
    Route::get('/add-employee', 'DashboardController@addEmployee');
    Route::post('/store-employee', 'DashboardController@storeEmployee');
    Route::get('/all-employees', 'DashboardController@allEmployees');
    Route::get('/view-employee/{id}', 'DashboardController@viewEmployee')->name('view-employee');
    Route::put('/update-employee/{id}', 'DashboardController@updateEmployee')->name('update-employee');
    Route::delete('/delete-employee/{employee}', 'DashboardController@deleteEmployee')->name('employee.delete');

    Route::get('/general-attendance', 'DashboardController@genAttend');

    Route::get('/designations', 'DesignationsController@index');
    Route::get('/edit-designation/{id}', 'DesignationsController@edit')->name('designation.edit');
    Route::put('/designation/{id}', 'DesignationsController@updateDesignation')->name('designation.update');
    Route::post('/designation', 'DesignationsController@storeDesignation');

    Route::put('/hr-approve/{id}', 'DashboardController@hrApprove')->name('approveuser.update');
    
    Route::post('/store-to-do-item', 'ToDoListController@store_to_do_item')->name('store.to_do_list');
    Route::put('/status/{id}', 'ToDoListController@update_status')->name('update.to_do');
    Route::delete('/delete-to-do-item/{id}', 'ToDoListController@destroy')->name('delete.to_do');

    // employees dashboard
    Route::get('/staff-dashboard', 'StaffController@index')->name('staff-dashboard');
    Route::put('/updateStaffStatus/{id}', 'StaffController@updateStaffStatus')->name('updateStaffStatus');

    Route::post('/step-out', 'StepInOutController@stepOut')->name('step.out');
    Route::put('/step-in/{id}', 'StepInOutController@stepIn')->name('step.in');

});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
