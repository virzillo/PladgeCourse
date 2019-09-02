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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

// Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');

Route::get('fetch-company/{id}', 'AjaxCrudController@fetchCompany');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {



    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('clients', 'ClientController');
    Route::resource('users', 'UserController');

    Route::resource('customers', 'CustomerController');
    Route::resource('courses', 'CourseController');
    Route::resource('modules', 'ModuleController');

    Route::get('/customer_query', 'CustomerController@query')->name('customer.query');


    Route::post('/company', 'CompanyController@store')->name('company.store');
    Route::get('/calendar', 'DashboardController@calendar')->name('calendar.index');
    Route::get('/classi', 'DashboardController@classi')->name('classi.index');

    Route::resource('settings', 'SettingController');
    Route::resource('storage', 'StorageController');
    Route::resource('proposal', 'ProposalController');

    // Route::post('storage', 'StorageController@add')->name('storage.add');
    Route::post('card', 'CardController@store')->name('card.store');
    Route::post('eicardcode', 'CardController@addcode')->name('eicardcode.store');

    Route::get('primanota', 'TransactionController@index')->name('spese.index');
    Route::post('primanota', 'TransactionController@store')->name('spese.store');
    // Route::post('primanota/uscite', 'TransactionController@uscita')->name('spese.uscite');

    Route::post('xsettings', 'XsettingController@store')->name('xsettings.store');
});
