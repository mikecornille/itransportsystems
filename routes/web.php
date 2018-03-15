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

Route::get('hauler/ach/{token}', 'HaulerController@achForm')->name('hauler.ach.form');
Route::post('hauler/ach', 'HaulerController@achProcess')->name('hauler.ach.process');
Route::get('/ach_success', function () {
    return view('/ach_success');
});
Route::get('/ach_no_carrier_found', function () {
    return view('/ach_no_carrier_found');
});


Route::group(['middleware' => 'auth'],function() {

Route::get('payMultipleRecordForm/{id}', 'CustomersController@payMultipleRecordForm');

Route::patch('payMultipleRecordForm', 'CustomersController@payMultipleRecordFormPost');

Route::post('/customerAccoutingEdit', 'CustomersController@customerAccoutingEdit');

Route::get('/customerAccoutingEditFromAccountsReceivablePage/{id}', 'CustomersController@customerAccoutingEditFromAccountsReceivablePage');

Route::put('/customer_accounting_update/{id}', 'CustomersController@CustomerAccountingUpdate')->name('customer_accounting_update');

Route::post('insertDOT', 'HaulerController@insertDOT');

Route::get('ach_email/{id}', 'HaulerController@ach_email');

Route::put('hauler/accountingUpdate/{hauler}', 'HaulerController@accountingUpdate')->name('hauler.accounting');

Route::resource('hauler', 'HaulerController');



Route::resource('remit', 'RemitController');

Route::resource('budget', 'BudgetController');

Route::resource('employee', 'EmployeeController');

Route::get('/newCarrier', function () {
    return view('/newCarrier');
});

Route::post('/haulerEdit', 'HaulerController@editForm');

Route::post('/hauler_edit_accounting', 'HaulerController@hauler_edit_accounting');



Route::get('/findHauler', function () {
    
    $id = "";
    return view('/findHauler', compact($id, 'id'));
});

Route::get('/newCustomer', function () {
    return view('/newCustomer');
});



Route::get('/createFromDOT', function () {
    return view('/createFromDOT');
});

Route::get('/newLocation', function () {
    return view('/newLocation');
});

Route::get('/newEquipment', function () {
    return view('/newEquipment');
});

Route::get('biWeeklyCustomerEmailList', 'CustomersController@biWeeklyCustomerEmailList');

// Route::get('/admin', function () {
// 	if ( ! Auth::user()->admin) {
// 		return redirect('/home');
// 	}
//     return view('/admin');
// });




Route::get('accounts_receivable', 'LoadsController@accounts_receivable');

Route::get('/carrier_accounting', function () {
	if ( ! Auth::user()->accounting) {
		return redirect('/home');
	}
    return view('/carrier_accounting');
});

Route::get('/customer_accounting', function () {
    if ( ! Auth::user()->accounting) {
        return redirect('/home');
    }
    return view('/customer_accounting');
});

Route::get('/toBeLoaded', function () {
    return view('/toBeLoaded');
});

Route::get('/toBeDelivered', function () {
    return view('/toBeDelivered');
});


Route::get('/findCarrier', function () {
    return view('/findCarrier');
});


Route::get('/displayLoads', function () {
    return view('/displayLoads');
});

Route::get('/deepSearchLoads', function () {
    return view('/deepSearchLoads');
});

Route::get('/bidboard', function () {
    return view('/bidboard');
});

Route::get('/start_bidboard', function () {
    return view('/start_bidboard');
});


Route::post('/bidboard', 'LoadlistController@startLoadList');

Route::get('/searchLoadlist', 'LoadlistController@searchLoadlistIndex');

Route::post('/searchLoadlist', 'LoadlistController@searchLoadlist');

Route::get('/emailTruckOffer/{id}', 'LoadlistController@emailTruckOffer');

Route::get('/emailCustomerGeneral', 'CustomersController@emailCustomerGeneral');

Route::post('/quote_loadlist', 'LoadlistController@storeFromQuote');

Route::get('/notes', 'NotesController@index');
Route::get('/myStats', 'NotesController@getBrokerStats');
Route::get('/admin', 'NotesController@getAdminStats');
Route::post('/admin', 'NotesController@getAdminStats'); 
Route::get('/findCustomer', 'CustomersController@getAmbassadorStats');
Route::get('/findTrucks', 'CarriersController@displayPage');
Route::post('/findTrucks', 'CarriersController@findTrucksByStateAndType');
Route::get('/findTrucksFromLoads', 'LoadsController@displayCarrierLoadsPage');
Route::post('/findTrucksFromLoads', 'LoadsController@findTrucksFromLoads');
Route::post('/loadlist', 'LoadlistController@store');
Route::get('/loadlist', 'LoadlistController@index');

//Route::get('/excel', 'PDFController@excel');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');

Route::get('/getProfitReport', function() {
    return view('/getProfitReport');
});

Route::post('/getProfitReport/{type}', 'MaatwebsiteDemoController@getProfitReport');

Route::post('/exportCustomerInvoices/{type}', 'MaatwebsiteDemoController@exportCustomerInvoices');

Route::get('/exportCustomerInvoices', function() {
    return view('/exportCustomerInvoices');
});

Route::get('/exportCarrierBills', function() {
    return view('/exportCarrierBills');
});

Route::post('/exportCarrierBills/{type}', 'MaatwebsiteDemoController@exportCarrierBills');

Route::get('/achCSV', function() {
    return view('/achCSV');
});

Route::post('/achCSV/{type}', 'MaatwebsiteDemoController@achCSV');

Route::get('/truckstopPost', 'MaatwebsiteDemoController@truckstopPost');

Route::get('/truckerPathPost', 'MaatwebsiteDemoController@truckerPathPost');

Route::get('/datPost', 'MaatwebsiteDemoController@datPost');





Route::get('/home', 'HomeController@index');
Route::post('/new', 'LoadsController@store');
Route::get('/loads', 'LoadsController@index');
Route::get('/deepLoads', 'LoadsController@deepLoads');
Route::get('/tobedata', 'LoadsController@indextwo'); //FOR DATATABLES
Route::get('/tobedatatwo', 'LoadsController@tobedatatwo'); //FOR DATATABLES
Route::get('/accountsReceivable', 'LoadsController@accountsReceivable'); //FOR DATATABLES
Route::get('/personal_status_table', 'LoadsController@personal_status_table'); //FOR DATATABLES
Route::get('/personal_status_loaded_table', 'LoadsController@personal_status_loaded_table'); //FOR DATATABLES
Route::get('/edit/{id}', 'LoadsController@edit');
Route::patch('load/{load}', 'LoadsController@update');
Route::get('duplicateInvoice/{id}', "LoadsController@duplicateInvoice");

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


Route::get('/editLoadlist/{id}', "LoadlistController@editLoadlist");
Route::patch('editLoadlist/{loadlist}', "LoadlistController@updateLoadlist");
Route::get('deleteLoadlist/{id}', "LoadlistController@destroy");
Route::get('duplicateLoadlist/{id}', "LoadlistController@duplicate");
Route::get('newDateLoadlist/{id}', "LoadlistController@newDateLoadlist");




Route::get('/emailLoad/{id}', 'LoadlistController@emailLoad');


//PRINT THE INVOICE AND RATE CONFIRMATION
Route::get('/getInvoicePDF/{id}', 'PDFController@getInvoicePDF');
Route::get('/getContractPDF/{id}', 'PDFController@getContractPDF');

//EMAILS SENT WITH LOAD DATA BUT NO ATTACHMENTS
Route::get('/internal/{id}', 'LoadsController@internalEmail');
Route::get('/emailLoadGroup/{id}', 'LoadsController@emailLoadGroup'); 
Route::get('/emailBrushJoe/{id}', 'LoadsController@emailBrushJoe');
Route::get('/status/{id}', 'LoadsController@getStatusEmail');
Route::get('/pod/{id}', 'LoadsController@podRequestEmail');
Route::get('/ur_safety/{id}', 'LoadsController@ur_safety');
Route::get('/ur_safety_help/{id}', 'LoadsController@ur_safety_help');
Route::get('/updateCustomer/{id}', 'LoadsController@updateCustomerEmail');
Route::get('/emailCarrier/{id}', 'LoadsController@emailCarrier');
Route::post('/edit/getInsurance', 'CarriersController@getInsurance');
Route::get('/emailShipper/{id}', 'LoadsController@emailShipper');
//FROM THE FIND CARRIER PAGE
Route::post('/getInsurance', 'CarriersController@getInsurance');
Route::post('/edit/sendCarrierInfo', 'CarriersController@sendCarrierInfo');
//FROM THE FIND CARRIER PAGE
Route::post('/sendCarrierInfo', 'CarriersController@sendCarrierInfo');
Route::post('/fast_carrier_setup', 'CarriersController@fast_carrier_setup');



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

//TEXT AND EMAIL ROLLBACK INFO
Route::get('/textAndEmailRollbackInfo/{id}', 'PDFController@textAndEmailRollbackInfo');

//TEXT DRIVER
Route::get('/textDriver/{id}', 'PDFController@textDriver');
Route::get('/textDriverDeliveryStatus/{id}', 'PDFController@textDriverDeliveryStatus');
Route::get('/textDriverPickStatus/{id}', 'PDFController@textDriverPickStatus');
Route::get('/textDriverLoadInfo/{id}', 'PDFController@textDriverLoadInfo');


//Route::post('/searchPro', 'LoadsController@searchPro');
Route::get('/fastCarrierSetUp', function() {
    return view('/fastCarrierSetUp');
});

Route::get('/emailSetUp', function() {
    return view('/emailSetUp');
});
Route::post('/emailSetUp', 'HaulerController@emailSetUp');
//EMAILS FROM NEW CARRIER DATA HAULER
Route::get('/certInsuranceCompany/{id}', 'HaulerController@certInsuranceCompany');
Route::get('/certCarrier/{id}', 'HaulerController@certCarrier');
Route::get('/emailColleagueHauler/{id}', 'HaulerController@emailColleagueHauler');
Route::get('/sendBrokerCarrierPacket/{id}', 'HaulerController@sendBrokerCarrierPacket');
Route::get('/carrierLoadDetails/{id}', 'HaulerController@carrierLoadDetails');

Route::get('countIncomingCalls/{id}', "LoadlistController@countIncomingCalls");
Route::get('countOutgoingCalls/{id}', "LoadlistController@countOutgoingCalls");
Route::get('emailedOut/{id}', "LoadlistController@emailedOut");


Route::get('generateTextList', "HaulerController@bookedTextList");



});
