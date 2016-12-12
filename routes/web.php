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
Route::get('/tobedata', 'LoadsController@indextwo');
Route::get('/tobedatatwo', 'LoadsController@tobedatatwo');

//New Customer Form Submission
Route::post('/newCustomer', 'CustomersController@store');


Route::get('/edit/{id}', 'LoadsController@edit');


Route::patch('load/{load}', 'LoadsController@update');

//Route::post('/searchPro', 'LoadsController@searchPro');

//Print the Invoice and Rate Confirmation
Route::get('/getInvoicePDF/{id}', 'PDFController@getInvoicePDF');
Route::get('/getContractPDF/{id}', 'PDFController@getContractPDF');


//Emails sent with load data but no PDF attachments needed
Route::get('/internal/{id}', 'LoadsController@internalEmail');
Route::get('/status/{id}', 'LoadsController@getStatusEmail');
Route::get('/pod/{id}', 'LoadsController@podRequestEmail');
Route::get('/updateCustomer/{id}', 'LoadsController@updateCustomerEmail');
Route::get('/emailCarrier/{id}', 'LoadsController@emailCarrier');


//Emailing Invoice and Rate Confirmation with an attachment
Route::get('/emailInvoicePDF/{id}', 'PDFController@emailInvoicePDF');
Route::get('/emailRateConPDF/{id}', 'PDFController@emailRateConPDF');
Route::get('/emailBOLCarrier/{id}', 'PDFController@emailBOLCarrier');
Route::get('/emailBOLYou/{id}', 'PDFController@emailBOLYou');

});

