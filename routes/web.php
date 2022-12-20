<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware'=>['auth','verified']],function () {
    Route::resource('invoices', '\App\Http\Controllers\InvoicesController');
    Route::resource('ArchiveController','\App\Http\Controllers\ArchiveController');
    Route::resource('InvoiceAttachments', '\App\Http\Controllers\InvoiceAttachmentsController');
    Route::resource('users','\App\Http\Controllers\UserController');
    Route::get('/invoices_details/{id}','\App\Http\Controllers\InvoicesDetailsController@edit');
    Route::get('/invoice_attachments/{id}','\App\Http\Controllers\InvoiceAttachmentsController@index');
    Route::get('/section/{id}', '\App\Http\Controllers\InvoicesController@getproducts');
    Route::resource('sections', '\App\Http\Controllers\SectionsController');
    Route::resource('products', '\App\Http\Controllers\ProductsController');
    Route::post('delete_file', '\App\Http\Controllers\InvoicesDetailsController@destroy')->name('delete_file');
    Route::get('download/{invoice_number}/{file_name}', '\App\Http\Controllers\InvoicesDetailsController@get_file');
    Route::get('View_file/{invoice_number}/{file_name}', '\App\Http\Controllers\InvoicesDetailsController@open_file');
    Route::get('/edit_invoice/{id}', '\App\Http\Controllers\InvoicesController@edit');
    Route::get('/Status_show/{id}', '\App\Http\Controllers\InvoicesController@show')->name('Status_show');
    Route::post('/Status_Update/{id}', '\App\Http\Controllers\InvoicesController@Status_Update')->name('Status_Update');
    Route::get('/section/{id}', '\App\Http\Controllers\InvoicesController@getproducts');
    Route::get('Invoice_Paid','\App\Http\Controllers\InvoicesController@Invoice_Paid');
    Route::get('Invoice_UnPaid','\App\Http\Controllers\InvoicesController@Invoice_UnPaid');
    Route::get('Invoice_Partial','\App\Http\Controllers\InvoicesController@Invoice_Partial');




    Route::get('/{page}', [AdminController::class, 'index']);
});

require __DIR__.'/auth.php';

