<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;

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

$users = [
    1 => [
        'id' => '1',
        'user_type' => 'client',
        'name' => 'Jonas',
        'surname' => 'Jonaitis',
    ],
    2 => [
        'id' => '2',
        'user_type' => 'worker',
        'name' => 'Petras',
        'surname' => 'Petraitis',
    ],
    3 => [
        'id' => '3',
        'user_type' => 'admin',
        'name' => 'Vardenis',
        'surname' => 'Pavardenis',
    ],


];

$conferences = [
    1 => [
        'id' => '1',
        'location' => 'Vilnius',
        'event_name' => 'Christmas Conference',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '1990-12-25'
    ],
    2 => [
        'id' => '2',
        'location' => 'Riga',
        'event_name' => 'Baltic Tech Summit',
        'registered_users' => [
        ],
        'event_date' => '2023-09-15'
    ],
    3 => [
        'id' => '3',
        'location' => 'London',
        'event_name' => 'AI Innovation Forum',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2023-11-10'
    ],
    4 => [
        'id' => '4',
        'location' => 'New York',
        'event_name' => 'Tech Expo',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2024-03-25'
    ],
    5 => [
        'id' => '5',
        'location' => 'San Francisco',
        'event_name' => 'Developer Conference',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2024-06-05'
    ],
    // You can continue adding more conferences here following the same format
];

//Index page
Route::get('/', function () {
    app()->setLocale('lt');
    return view('index');
})->name('index');

//client
Route::prefix('client')->name('client.')->group(function () use ($conferences){
    app()->setLocale('lt');
    
    Route::get('/conferences', function () use ($conferences) {
        return app(ClientController::class)->index($conferences);
    })->name('conferences');

    Route::get('conferences/show/{id}', function ($id) use ($conferences) {
        app()->setLocale('lt');
    
        if (array_key_exists($id, $conferences)) {
            return view('client.show', ['conf' => $conferences[$id]]);
        } else {
            return 'Konferencija nerasta';
        }
    })->name('client.show');
    // Route::get('/conferences/show/{id}', [ClientController::class, 'showConference'])->name('showConference');
    // Route::get('/conferences/register/{id}', [ClientController::class, 'registerConference'])->name('registerConference');
});

// //client
// Route::prefix('client')->name('client.')->group(function () use ($conferences) {

//     Route::get('conferences', function () use ($conferences) {
//         app()->setLocale('lt');
//         return view('client.conferences', ['conferences' => $conferences]);
//     })->name('client.conferences');

//     Route::get('conferences/show/{id}', function ($id) use ($conferences){
//         app()->setLocale('lt');

//         if (array_key_exists($id, $conferences)) {
//             return view('client.show', ['conf' => $conferences[$id]]);
//         } else {
//             return 'Konferencija nerasta';
//         }

//     })->name('client.show');


//     Route::get('conferences/register/{id}', function ($id) use ($conferences){
//         app()->setLocale('lt');

//         if (array_key_exists($id, $conferences)) {
//             return view('client.register', ['conf' => $conferences[$id]]);
//         } else {
//             return 'Konferencija nerasta';
//         }

//     })->name('client.register');
// });

// //employee
// Route::prefix('worker')->name('worker.')->group(function () {
//     Route::get('conferences');
//     Route::get('conferences/show');
// });

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('conferences', ArticlesController::class);
// });
