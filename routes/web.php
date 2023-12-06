<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\SubAgentController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\LoanMasterController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LoanDocumentController;


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
    return view('form');
});
Route::get('customer', function () {
    return view('welcome');
});

Route::get('admin/login', function () {
    return view('auth.admin');
});
Route::post('agent-login',[AgentController::class, 'loginAgent']);


Route::post('add-agent',[AgentController::class, 'insert']);
Route::post('add-customer',[AgentController::class, 'insertCustomer']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'import-excel', 'middleware'=> ['auth','role']], function(){
	Route::get('/',[ImportController::class, 'all']);
	Route::get('add',[ImportController::class, 'add']);
	Route::post('add',[ImportController::class, 'insert']);
});

Route::get('export-excel',[ImportController::class, 'exportExcel']);


Route::group(['prefix' => 'agents', 'middleware'=> ['auth','role']], function(){
	Route::get('/',[AgentController::class, 'all']);
	Route::get('add',[AgentController::class, 'add']);
	Route::get('delete/{id}',[AgentController::class, 'delete']);
	Route::get('edit/{id}',[AgentController::class, 'edit']);
	Route::post('add',[AgentController::class, 'insert']);
	Route::get('status/{id}',[AgentController::class, 'status']);
	Route::post('edit/{id}',[AgentController::class, 'update']);
});

Route::group(['prefix' => 'customers', 'middleware'=> ['auth']], function(){
	Route::get('/',[SubAgentController::class, 'all']);
	Route::get('add',[SubAgentController::class, 'add']);
	Route::get('delete/{id}',[SubAgentController::class, 'delete']);
	Route::get('edit/{id}',[SubAgentController::class, 'edit']);
	Route::post('add',[SubAgentController::class, 'insert']);
	Route::get('status/{id}',[SubAgentController::class, 'status']);
	Route::post('edit/{id}',[SubAgentController::class, 'update']);
});

Route::group(['prefix' => 'loan-types', 'middleware'=> ['auth']], function(){
	Route::get('/',[LoanMasterController::class, 'all']);
	Route::get('add',[LoanMasterController::class, 'add']);
	Route::get('edit/{id}',[LoanMasterController::class, 'edit']);
	Route::get('status/{id}',[LoanMasterController::class, 'status']);
	Route::post('edit/{id}',[LoanMasterController::class, 'update']);
	Route::post('add',[LoanMasterController::class, 'insert']);
	Route::get('assign/{id}',[LoanMasterController::class, 'documents']);
	Route::post('assign/{id}',[LoanMasterController::class, 'assignDocuments']);

});

Route::group(['prefix' => 'loan-documents', 'middleware'=> ['auth']], function(){
	Route::get('/',[LoanDocumentController::class, 'all']);
	Route::get('add',[LoanDocumentController::class, 'add']);
	Route::get('edit/{id}',[LoanDocumentController::class, 'edit']);
	Route::get('status/{id}',[LoanDocumentController::class, 'status']);
	Route::post('edit/{id}',[LoanDocumentController::class, 'update']);
	Route::post('add',[LoanDocumentController::class, 'insert']);
});

Route::group(['prefix' => 'loan-applications', 'middleware'=> ['auth']], function(){
	Route::get('/',[LoanApplicationController::class, 'all']);
});

	Route::get('loan-panel',[PanelController::class, 'loadLoanPage']);
	Route::get('view-loan/{id}',[PanelController::class, 'viewLoanLead']);
	Route::post('upload-loan',[PanelController::class, 'uploadLoan']);
	Route::post('edit-dsa/{id}',[PanelController::class, 'updateDSA']);

Route::get('change-password',[PanelController::class, 'loadChangePasswordPage']);
Route::post('change-password',[PanelController::class, 'changePassword']);