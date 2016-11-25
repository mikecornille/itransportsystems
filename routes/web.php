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

Route::get('/twilio', function () {
    return view('twilio');
});


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::post('/new', 'LoadsController@store');
Route::get('/loads', 'LoadsController@index');


Route::get('/edit/{id}', 'LoadsController@edit');


Route::patch('load/{load}', 'LoadsController@update');

//Print the Invoice and Rate Confirmation

Route::get('/getInvoicePDF/{id}', 'PDFController@getInvoicePDF');

Route::get('/getContractPDF/{id}', 'PDFController@getContractPDF');

Route::get('/emailInvoicePDF/{id}', 'PDFController@emailInvoicePDF');


//Emails sent with load data

Route::get('/internal/{id}', 'LoadsController@internalEmail');

Route::get('/status/{id}', 'LoadsController@getStatusEmail');

Route::get('/pod/{id}', 'LoadsController@podRequestEmail');

Route::get('/updateCustomer/{id}', 'LoadsController@updateCustomerEmail');

Route::get('/sendmail/{id}', 'LoadsController@youtubetest');


Route::get('/basicemail/{id}','PDFController@attach_email');


