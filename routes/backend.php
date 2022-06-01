<?php
use App\Ticket;
use App\User;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'Backend\HomeController@dashboard')->name('dashboard');
Route::get('/changelog', 'Backend\HomeController@changelog')->name('changelog');
Route::resource('/tickets', 'Backend\TicketController');
Route::get('/tickets/create/remote', 'Backend\TicketController@create_remote')->name('tickets.create.remote');
Route::get('/export/tickets/{start_date}/{end_date}/{status}', 'Backend\TicketController@export')->name('tickets.export');
Route::resource('/tickets/attachment', 'Backend\TicketAttachmentController');
Route::get('tickets/attachment/destroy/{id}', 'Backend\TicketAttachmentController@destroy')->name('attachment.destroy');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('/roles', 'Backend\RoleController');
    Route::resource('/users', 'Backend\UserController');
    Route::get('/profile', 'Backend\UserController@profile')->name('profile.index');
    Route::resource('/incident-types', 'Backend\IncidentTypeController');
    Route::resource('/vehicle-types', 'Backend\VehicleTypeController');
});