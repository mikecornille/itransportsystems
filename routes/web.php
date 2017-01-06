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


Route::get('/findTrucks', function () {
    return view('/findTrucks');
});

Route::get('/findCarrier', function () {
    return view('/findCarrier');
});

Route::get('/displayLoads', function () {
    return view('/displayLoads');
});

Route::get('/notes', 'NotesController@index');
Route::get('/myStats', 'NotesController@getBrokerStats');


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
Route::post('/newCarrier', 'CarriersController@store');
Route::post('/newEquipment', 'EquipmentController@store');
Route::post('/newNote', 'NotesController@store');


//UPDATE DATABASES WITH AJAX
Route::post('/updateCustomer', "CustomersController@updateCustomer");
Route::post('/edit/updateCustomer', "CustomersController@updateCustomer");
Route::post('/updateLocation', "LocationsController@updateLocation");
Route::post('/edit/updateLocation', "LocationsController@updateLocation");
Route::post('/updateEquipment', "EquipmentController@updateEquipment");
Route::post('/edit/updateEquipment', "EquipmentController@updateEquipment");
Route::post('/edit/updateCarrier', "CarriersController@updateCarrier");
//FROM THE FIND CARRIER PAGE
Route::post('/updateCarrier', "CarriersController@updateCarrier");


//PRINT THE INVOICE AND RATE CONFIRMATION
Route::get('/getInvoicePDF/{id}', 'PDFController@getInvoicePDF');
Route::get('/getContractPDF/{id}', 'PDFController@getContractPDF');

//EMAILS SENT WITH LOAD DATA BUT NO ATTACHMENTS
Route::get('/internal/{id}', 'LoadsController@internalEmail');
Route::get('/status/{id}', 'LoadsController@getStatusEmail');
Route::get('/pod/{id}', 'LoadsController@podRequestEmail');
Route::get('/updateCustomer/{id}', 'LoadsController@updateCustomerEmail');
Route::get('/emailCarrier/{id}', 'LoadsController@emailCarrier');
Route::post('/edit/getInsurance', 'CarriersController@getInsurance');
//FROM THE FIND CARRIER PAGE
Route::post('/getInsurance', 'CarriersController@getInsurance');
Route::post('/edit/sendCarrierInfo', 'CarriersController@sendCarrierInfo');
//FROM THE FIND CARRIER PAGE
Route::post('/sendCarrierInfo', 'CarriersController@sendCarrierInfo');


//EMAILS SENT WITH PDF ATTACHMENTS
Route::get('/emailInvoicePDF/{id}', 'PDFController@emailInvoicePDF');
Route::get('/emailRateConPDF/{id}', 'PDFController@emailRateConPDF');
Route::get('/emailBOLCarrier/{id}', 'PDFController@emailBOLCarrier');
Route::get('/emailBOLYou/{id}', 'PDFController@emailBOLYou');
Route::post('/edit/getPacket', 'CarriersController@getPacket');
//FROM THE FIND CARRIER PAGE
Route::post('/getPacket', 'CarriersController@getPacket');

//TEXT LOAD INFO
Route::get('/textLoadInfo/{id}', 'PDFController@textLoadInfo');


//Route::post('/searchPro', 'LoadsController@searchPro');



});

