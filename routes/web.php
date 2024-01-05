<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\AdminController;

use App\Models\User;
use App\Models\Conference;


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

//all data from database
$users = User::all();
$conferences = Conference::all();

app()->setLocale('lt');

//Index page
Route::get('/', function () {
    return view('index');
})->name('index');

//success page
Route::get('/success', function () {
    return view('success');
})->name('success');

//client
Route::prefix('client')->name('client.')->group(function () use ($conferences) {
 
    Route::get('/conferences', function () use ($conferences) {
        return app(ClientController::class)->index($conferences);
    })->name('conferences');

    Route::get('/conferences/show/{id}', function ($id) use ($conferences) {
        return app(ClientController::class)->show($conferences, $id);
    })->name('show');

    Route::get('/conferences/register/{id}', function ($id) use ($conferences) {
        return app(ClientController::class)->register($conferences, $id);
    })->name('register');

});


//Worker
Route::prefix('worker')->name('worker.')->group(function () use ($conferences) {

    Route::get('/conferences', function () use ($conferences) {
        return app(WorkerController::class)->index($conferences);
    })->name('conferences');

    Route::get('/conferences/show/{id}', function ($id) use ($conferences) {
        return app(WorkerController::class)->show($conferences, $id);
    })->name('show');

});

//Admin
Route::prefix('admin')->name('admin.')->group(function () use ($users,$conferences){

    Route::get('/menu', function () {
        return app(AdminController::class)->index();
    })->name('menu');

    Route::get('/menu/userlist', function () use ($users){
        return app(AdminController::class)->userList($users);
    })->name('userlist');

    Route::get('/menu/userlist/useredit/{id}', function ($id) use ($users) {
        return app(AdminController::class)->userEdit($users,$id);
    })->name('useredit');

    Route::get('/menu/userlist/conferencelist', function () use ($conferences) {
        return app(AdminController::class)->showConferences($conferences);
    })->name('conferencelist');

    Route::get('/menu/userlist/conferencelist/newconference', function ()  {
        return app(AdminController::class)->newConference();
    })->name('newconference');

    Route::get('/menu/userlist/conferencelist/conferenceedit/{id}', function ($id) use ($conferences)   {
        return app(AdminController::class)->editConference($conferences, $id);
    })->name('conferenceedit');
    
    Route::get('/menu/userlist/conferencelist/conferencedelete/{id}', function ($id) use ($conferences)   {
        return app(AdminController::class)->deleteConference($conferences, $id);
    })->name('conferencedelete');

    // for storing new conference
    Route::post('/menu/userlist/conferencelist/store', [AdminController::class, 'storeConference'])->name('storeConference');

    //Updating user
    Route::put('/menu/userlist/useredit/{id}', [AdminController::class, 'putUser'])->name('useredit');
});
