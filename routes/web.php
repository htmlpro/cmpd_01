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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/fax', 'BarcodeController@fax')->name('fax');
Route::get('/testfaxpdf', 'BarcodeController@testFaxPDF')->name('faxpdf');
Route::post('/scannedlog', 'PrescriptionController@getScanLogDetails')->name('scannedlog.details');
Route::post('/scannedrx', 'PrescriptionController@getScanRxDetails')->name('scannedrx.details');
Route::get('/cmpdlabelprint','CompoundLabelPrint@index')->name('cmpd.labelprint');
Route::get('/cmpdlabelprint/{order_id}/{rx_id}/{formula_id}', 'CompoundLabelPrint@index')->name('cmpd.labelprint');

Route::get('/passwordExpiration', 'Auth\PwdExpirationController@showPasswordExpirationForm');
Route::post('/passwordExpiration', 'Auth\PwdExpirationController@postPasswordExpiration')->name('passwordExpiration');

Route::get('/mails', 'MailAttachments@index')->name('mails');
Route::get('/barcode', 'BarcodeController@index')->name('barcode');
/**
 * Routes for PDF Manipulation 
 *
 */
Route::middleware(['auth'])->group(function () {

    Route::post('merge', 'MergeController@index');
    Route::post('split', 'SplitController@index');
    Route::post('delete', 'DeleteController@index');
    Route::get('ebook', 'EbooksController@index');
    Route::post('upload', 'AjaxUploadController@uploadAttachment')->name('ajaxupload.uploadAttachment');
    Route::post('upload/merge', 'AjaxUploadController@mergeAttachment')->name('ajaxupload.mergeAttachment');
});

/**
 * Routes for Patients 
 *
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/patients', 'PatientsController@index')->name('patients');
    Route::post('/patient/create', 'PatientsController@addPatient')->name('addpatient');
    Route::get('/patient/edit/{id}', 'PatientsController@editPatient')->name('patient.edit');
    Route::post('/patient/update', 'PatientsController@updatePatient')->name('patient.update');
    Route::get('/patient/view/{patient_id}', 'PatientsController@viewPatient')->name('viewPatient');
});

/**
 * Routes for Orders 
 *
 */
Route::middleware(['auth'])->group(function () {
    
    // Order Reception Routes
    Route::get('orders', 'OrdersController@index')->name('orders');
    Route::get('/order/manage/reception/{order_id}/{rx_id?}', 'OrdersController@manageOrderReception')->name('manageorder.reception');
    Route::post('/order/savemanageorder', 'OrdersController@saveManageOrder')->name('savemanageorder');
    Route::post('/order/create', 'OrdersController@addManualOrder')->name('addorder');
    Route::post('/order/change', 'OrdersController@columnReorder')->name('columnreorder');
    Route::post('/order/getcolumorder', 'OrdersController@getColumOrder')->name('getcolumorder');
    Route::any('/order/changeorderstate/{order_id}', 'OrdersController@changeOrderState')->name('order.changeorderstate');
    Route::post('/pk/formula', 'OrdersController@getPkFormulaPrice')->name('pk.formula.price');
    // Order Reception Routes - End
    
    // Order Entry Routes
    Route::get('entry', 'OrderEntryController@index')->name('order.entry');
    Route::get('/order/manage/entry/{order_id}/{rx_id?}', 'OrderEntryController@manageOrderEntry')->name('manageorder.entry');
    Route::post('/order/log_id', 'OrderEntryController@getLogId')->name('order.log_id');
    Route::any('/entry/changeorderstate/{order_id}', 'OrderEntryController@changeOrderState')->name('entry.changeorderstate');  
    // Order Entry Routes - End
    
    //Prescription Routes 
    Route::post('/order/addrx', 'PrescriptionController@addRx')->name('addrx');
    Route::post('/delete/rx', 'PrescriptionController@deleteRx')->name('deleterx');
    Route::post('/order/editrx', 'PrescriptionController@editRx')->name('order.editrx');
    Route::post('/prescription/schedule', 'PrescriptionController@checkPatientSchedule')->name('patient.schedule');
    Route::post('/rxhistory', 'PrescriptionController@rxHistory')->name('rxhistory');
	Route::any('/refills/', 'RefillController@refillPrescription')->name('refill.rx');
    //End Prescription Routes
    
    // Order Pre-verification Routes
    Route::get('preverification', 'PreVerificationController@index');
    Route::get('/order/manage/preverification/{order_id}/{rx_id}', 'PreVerificationController@managePreverification')->name('manageorder.preverification');
    Route::any('/preverification/changeorderstate/{rx_id}/{order_id?}/{change_state?}', 'PreverificationController@changeOrderState')->name('preverif.changeorderstate');
    // Order Pre-verification Routes - End
    
    // Order Filling Routes
    Route::get('filling', 'OrderFillingController@index');
    Route::get('/order/manage/filling/{order_id}/{rx_id}', 'OrderFillingController@manageOrderFilling')->name('manageorder.order_filling');
    Route::any('/filling/changeorderstate/{rx_id}/{order_id?}/{change_state?}', 'OrderFillingController@changeOrderState')->name('filling.changeorderstate');
    Route::get('/printlabel/{order_id}/{rx_id}/{log_id}', 'OrderFillingController@printLabel')->name('filling.printlabel');
    Route::get('/printworksheet/{order_id}/{rx_id}/{log_id}', 'OrderFillingController@printWorksheet')->name('filling.printworksheet');
    // Order Filling Routes - End
    
    // Order Verification Routes
    Route::get('verification', 'VerificationController@index')->name('verification');
    Route::any('/verification/changeorderstate/{rx_id}/{order_id?}/{change_state?}', 'VerificationController@changeOrderState')->name('verification.changeorderstate');
    Route::get('/order/manage/verification/{order_id}/{rx_id}', 'VerificationController@manageOrderVerification')->name('manageorder.verification');
    // Order Verification Routes - End
    
    // Order Dispatch Routes
    Route::get('dispatch', 'OrderDispatchController@index')->name('dispatch');
    Route::post('order/manage/dispatch', 'OrderDispatchController@manageDispatch')->name('manage.dispatch');
    Route::get('order/manage/dispatch', 'OrderDispatchController@redirectToManage')->name('redirect.to.manage');
    Route::post('/dispatch/save', 'OrderDispatchController@saveDispatchToDetails')->name('order.dispatch.save');
    Route::any('/dispatch/changeorderstate', 'OrderDispatchController@changeOrderState')->name('dispatch.changeorderstate');
    Route::post('/dispatch', 'OrderDispatchController@getDispatchTo')->name('order.dispatch');
    Route::post('/dispatch/courier', 'OrderDispatchController@getCourierDetail')->name('dispatch.courier');
    Route::post('/orderdispatch', 'OrderDispatchController@orderDispatch')->name('order.dispatch');
    Route::post('order/manage/changeStage', 'HomeController@changeStage')->name('manage.changeStage');

    // Order Dispatch Routes END
    
    // Order Invoice Routes
    Route::get('invoice', 'OrderInvoiceController@index')->name('invoice.index');
    Route::post('order/manage/invoice', 'OrderInvoiceController@manageInvoice')->name('manage.invoice');
    Route::get('order/manage/invoice', 'OrderInvoiceController@redirectToManage')->name('redirect.to.manage');
    Route::any('/invoice/changeorderstate', 'OrderInvoiceController@changeOrderState')->name('invoice.changeorderstate');
    // Order Invoice Routes End
    
    // Order Complete Hold Routes
    Route::get('complete', 'OrderCompleteController@index')->name('on.complete');
    Route::any('/complete/changeorderstate', 'OrderCompleteController@changeOrderState')->name('complete.changeorderstate');
    // Order Complete End
    
    // Problem On Hold Routes
    Route::get('onhold', 'ProblemOnHoldController@index')->name('on.hold');
    Route::post('onhold/changeorderstate/{order_id}', 'ProblemOnHoldController@changeOrderState')->name('on.hold.changeorderstate');
    // Problem On Hold Routes End
    
    // All Queue Routees
     Route::get('all', 'AllQueueController@index')->name('all.queue');
     Route::get('providerallqueue', 'AllQueueController@providerAllQueue')->name('provider.allqueue');
     // All Queue Routes End
    
    // Order Delete Routes
    Route::get('order/delete', 'OrderDeleteController@index')->name('orderdelete');
    // Order Delete Routes END
    
    // SIG Routes
    Route::post('/order/sig_code', 'SigController@getSigDescription')->name('order.sig_description');
    // SIG Routes END
    
});

/**
 * CRUD operational routes for Patient
 *
 */
Route::middleware(['auth'])->group(function () {

    Route::get('/patients/{id}/delete', 'PatientsController@removePatient')->name('removepatient');

    Route::get('/patients', 'PatientsController@index')->name('patients');
    Route::get('/patient', 'PatientsController@getPatient')->name('patient.getPatient');
    Route::post('/patients/{id}/edit', 'PatientsController@editPatient')->name('editpatient');
    Route::post('/patients/create', 'PatientsController@addPatient')->name('addpatient');
    // Route::post('/patients/{id}/update', 'PatientsController@updatePatient')->name('updatepatient');
});

/**
 * CRUD operational routes for Providers
 *
 */
Route::middleware(['auth'])->group(function () {

    Route::resource('providers', 'ProvidersController');
    Route::post('/provider/create', 'ProvidersController@store');
    Route::get('provider/edit/{id}', 'ProvidersController@edit')->name('provider.edit');
    Route::post('provider/update', 'ProvidersController@update')->name('provider.update');
    Route::get('provider/view/{id}', 'ProvidersController@view');
    Route::post('provider/updateprice', 'ProvidersController@updatePrice')->name('provider.updateprice');
    Route::post('provider/latestformulaprice', 'ProvidersController@getLatestFormulaPrice')->name('provider.latest.formulaprice');
    
    Route::get('provider/formula/edit/{provider_id}/{formula_id}', 'ProvidersController@formulaEdit');
    Route::post('/provider/formula/update', 'ProvidersController@updateFormula');
    Route::get('/provider/formula/view/{provider_id}/{formula_id}', 'ProvidersController@viewFormula');
});

/**
 * Label/Worksheet Print operational routes
 * 
 */
Route::middleware(['auth'])->group(function () {
    
    Route::get('/print', 'PrintController@index')->name('print');
    Route::post('/labelprint', 'PrintController@labelPrint')->name('labelprint');
    Route::post('/printworksheet', 'PrintController@invoicePrint')->name('printworksheet');
});

Route::post('/addnote', 'NoteController@addNote')->name('addnote');
Route::post('checknoteexists', 'NoteController@checkNoteExist')->name('check.note.exist');

/**
 * CRUD operational routes for reports
 *
 */
Route::middleware(['auth'])->group(function () {
    Route::get('prescriptionreports', 'ReportController@index')->name('prescription.reports');
    Route::post('export', 'ReportController@presCSVReports')->name('prescription.csv.reports');
});
/**
 * CRUD operational routes for Matrix
 *
 */
Route::middleware(['auth'])->group(function () {
    Route::get('matrix', 'MatrixController@index')->name('matrix.index');
    Route::post('matrixsave', 'MatrixController@save')->name('matrix.save');

});
/**
 * CRUD operational routes for Pharmacy Info Master
 *
 */
Route::middleware(['auth'])->group(function () {
    Route::get('pharmacyinfo', 'PharmacyInfoMaterController@index')->name('pharmacyinfo.index');
    Route::post('pharmacyinfo/update', 'PharmacyInfoMaterController@update')->name('pharmacyinfo.update');


});
Route::middleware(['auth'])->group(function () {
    Route::post('printMutlipleLabel', 'MultipleCompoundLabelPrint@index')->name('printMutlipleLabel');
    Route::get('printMutlipleWorkSheet', 'MultipleWorkSheetPrint@index')->name('printMutlipleWorkSheet');


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rx info
*/
Route::get('/prescription/info/{stage}/{order_id}/{rx_id?}', 'PrescriptionInfoController@otherGrid')->name('prescription.othergrid');
Route::get('/all/prescription/info/{stage}/{current_stage}/{order_id}/{rx_id?}', 'PrescriptionInfoController@allGrid')->name('allgrid.prescription.info');
Route::get('/patient/prescription/info/{stage}/{current_stage}/{patient_id}/{order_id}/{rx_id?}', 'PrescriptionInfoController@patientGrid')->name('patient.prescription.info');
Route::any('/prescription/changeorderstate/{rx_id}/{order_id?}/{change_state?}', 'PrescriptionInfoController@changeOrderState')->name('prescription.changeorderstate');
    
