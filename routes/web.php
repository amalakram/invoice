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
    return view('auth.login');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('invoices','InvoicesController');
Route::resource('sections','sectionsController');
Route::resource('products','ProductsController');

/// ///////////////////////quotation////////////////////////////////////
//Route::resource('quotation','QuotationController');
Route::resource('Quotation','QuotationController');
Route::get('/show_quotation/{id}', 'QuotationController@show')->name('show_quotation');
Route::get('quotation/print/{id}', ['as' => 'quotation.Print_quotation', 'uses' => 'QuotationController@print']);
//Route::get('quotation/pdf/{id}', ['as' => 'quotation.pdf_quotation', 'uses' => 'QuotationController@pdf']);
Route::get('export_quotation', 'QuotationController@export');
Route::get('/edit_quotation/{id}', 'QuotationController@edit');
//Route::get('/', 'QuotationController@create')->name('create');


Route::get('/QuotitionDetails/{id}', 'QuotitionDetailsController@edit');
Route::resource('quotition_attachment', 'QuotitionAttachmentController');

Route::get('downloadQ/{quote_number}/{file_name}', 'QuotitionDetailsController@get_file');

Route::get('View_fileQ/{quote_number}/{file_name}', 'QuotitionDetailsController@open_file');

Route::post('delete_fileQ','QuotitionDetailsController@destroy')->name('delete_fileQ');
//Route::post('delete_fileQ', 'QuotitionDetailsController@destroy');

Route::resource('ArchiveQ', 'QuotitionAchiveController');


///////////////////////////employee/////////////////////////////////////////
Route::resource('employee','EmployeeController');
Route::get('/employee/{id}', 'EmployeeController@update');
Route::resource('Attendance','AttendanceController');
Route::get('/update/{id}', 'AttendanceController@update');
Route::get('/employee/{id}', 'AttendanceController@getemployeeName');
Route::resource('Overtime','OvertimeController');
Route::get('/employee/{id}', 'OvertimeController@getemployeeName');

Route::resource('Payroll','PayrollController');
//Route::get('/employee/{id}', 'PayrollController@getemployeeName');
Route::get('/Overtime/{id}', 'PayrollController@getovertime');

Route::resource('customer','CostomerController');
//Route::get('/update/{id}', 'CostomerController@update');

/////////////////////////////////////Petty Cash///////////////

Route::resource('PettyCash','PettyCashController');
Route::resource('ArchiveP', 'PettyCashAchiveController');
///////////////////////////////report///////////////////
Route::get('invoices_report', 'Invoices_Report@index');

Route::post('Search_invoices', 'Invoices_Report@Search_invoices');

Route::get('employee_Report', 'employee_Report@index')->name("employee_Report");

Route::post('Search_employee', 'employee_Report@Search_employee');


Route::get('pettycach_Report', 'pettycach_Report@index')->name("employee_Report");

Route::post('Search_pettycach', 'pettycach_Report@Search_pettycach');

Route::get('qoutition_Report', 'qoutition_Report@index')->name("qoutition_Report");


Route::post('Search_qoutition', 'qoutition_Report@Search_qoutition');


///////////////////////////////invoices//////////////////////////////////////
//Route::resource('Invoices_Attachments', 'InvoiceAttachmentsController');
//Route::resource('Invoices_Details', 'InvoicesDetailsController');

Route::get('/section/{id}', 'InvoicesController@getproducts');
Route::get('/InvoicesDetails/{id}', 'InvoicesDetailsController@edit');
Route::resource('invoices_attachments', 'InvoicesAttachmentsController');

Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');

Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');

Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');

Route::get('/edit_invoice/{id}', 'InvoicesController@edit');
Route::get('/edit_quotation/{id}', 'QuotationController@edit');
Route::get('/Status_show/{id}', 'InvoicesController@show')->name('Status_show');
//Route::get('Print_quotation/{id}','QuotationController@Print_quotation');
Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');


Route::resource('Archive', 'InvoiceAchiveController');
Route::get('Invoice_Paid','InvoicesController@Invoice_Paid');
Route::get('Invoice_UnPaid','InvoicesController@Invoice_unPaid');
Route::get('Invoice_Partial','InvoicesController@Invoice_Partial');

Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');

Route::get('export_invoices', 'InvoicesController@export');

Route::group(['middleware' => ['auth']], function() {

Route::resource('roles','RoleController');

Route::resource('users','UserController');

});

Route::get('invoices_report', 'Invoices_Report@index');

Route::post('Search_invoices', 'Invoices_Report@Search_invoices');

Route::get('customers_report', 'Customers_Report@index')->name("customers_report");

Route::post('Search_customers', 'Customers_Report@Search_customers');

Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('unreadNotifications_count', 'InvoicesController@unreadNotifications_count')->name('unreadNotifications_count');

Route::get('unreadNotifications', 'InvoicesController@unreadNotifications')->name('unreadNotifications');


Route::get('/{page}', 'AdminController@index');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


