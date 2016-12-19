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

Route::get('/twilio', function () {
    return view('twilio');
});


Route::group(['middleware' => 'auth'],function() {


Route::get('/newCarrier', function () {
    return view('/newCarrier');
});

Route::get('/newCustomer', function () {
    return view('/newCustomer');
});

Route::get('/newLocation', function () {
    return view('/newLocation');
});

Route::get('/newEquipment', function () {
    return view('/newEquipment');
});

Route::get('/admin', function () {
	if ( ! Auth::user()->admin) {
		return redirect('/home');
	}
    return view('/admin');
});

Route::get('/accounting', function () {
	if ( ! Auth::user()->accounting) {
		return redirect('/home');
	}
    return view('/accounting');
});

Route::get('/toBeLoaded', function () {
    return view('/toBeLoaded');
});

Route::get('/toBeDelivered', function () {
    return view('/toBeDelivered');
});

Route::get('/myStats', function () {
    return view('/myStats');
});

Route::get('/findTrucks', function () {
    return view('/findTrucks');
});


Route::get('/home', 'HomeController@index');
Route::post('/new', 'LoadsController@store');
Route::get('/loads', 'LoadsController@index');
Route::get('/tobedata', 'LoadsController@indextwo'); //FOR DATATABLES
Route::get('/tobedatatwo', 'LoadsController@tobedatatwo'); //FOR DATATABLES
Route::get('/edit/{id}', 'LoadsController@edit');
Route::patch('load/{load}', 'LoadsController@update');

//CREATE NEW DATABASE RECORDS
Route::post('/newCustomer', 'CustomersController@store');
Route::post('/newLocation', 'LocationsController@store');

//UPDATE DATABASES WITH AJAX
Route::post('/updateCustomer', "CustomersController@updateCustomer");
Route::post('/updateLocation', "LocationsController@updateLocation");

//PRINT THE INVOICE AND RATE CONFIRMATION
Route::get('/getInvoicePDF/{id}', 'PDFController@getInvoicePDF');
Route::get('/getContractPDF/{id}', 'PDFController@getContractPDF');

//EMAILS SENT WITH LOAD DATA BUT NO ATTACHMENTS
Route::get('/internal/{id}', 'LoadsController@internalEmail');
Route::get('/status/{id}', 'LoadsController@getStatusEmail');
Route::get('/pod/{id}', 'LoadsController@podRequestEmail');
Route::get('/updateCustomer/{id}', 'LoadsController@updateCustomerEmail');
Route::get('/emailCarrier/{id}', 'LoadsController@emailCarrier');

//EMAILS SENT WITH PDF ATTACHMENTS
Route::get('/emailInvoicePDF/{id}', 'PDFController@emailInvoicePDF');
Route::get('/emailRateConPDF/{id}', 'PDFController@emailRateConPDF');
Route::get('/emailBOLCarrier/{id}', 'PDFController@emailBOLCarrier');
Route::get('/emailBOLYou/{id}', 'PDFController@emailBOLYou');

});

