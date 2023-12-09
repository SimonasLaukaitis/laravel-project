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
        'event_date' => '1990-12-25',
        'info' => 'The Christmas Conference is a festive gathering in Vilnius, celebrating the holiday spirit with tech enthusiasts and industry leaders.'
    ],
    2 => [
        'id' => '2',
        'location' => 'Riga',
        'event_name' => 'Baltic Tech Summit',
        'registered_users' => [
        ],
        'event_date' => '2023-09-15',
        'info' => 'The Baltic Tech Summit aims to bring together innovators and entrepreneurs from the Baltic region, fostering collaboration and technological advancements.'
    ],
    3 => [
        'id' => '3',
        'location' => 'London',
        'event_name' => 'AI Innovation Forum',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2023-11-10',
        'info' => 'The AI Innovation Forum in London serves as a platform for discussing the latest trends and breakthroughs in artificial intelligence, gathering experts and visionaries.'
    ],
    4 => [
        'id' => '4',
        'location' => 'New York',
        'event_name' => 'Tech Expo',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2024-03-25',
        'info' => 'The Tech Expo in New York showcases cutting-edge technologies and provides a stage for tech enthusiasts to explore innovations across various industries.'
    ],
    5 => [
        'id' => '5',
        'location' => 'San Francisco',
        'event_name' => 'Developer Conference',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2024-06-05',
        'info' => 'The Developer Conference in San Francisco is a hub for developers, offering insights into the latest tools, languages, and best practices in software development.'
    ],
    // More conferences can be added here following the same format
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

    Route::get('/conferences/show/{id}', function ($id) use ($conferences) {
        return app(ClientController::class)->show($conferences,$id);
    })->name('show');

    Route::get('/conferences/register/{id}', function ($id) use ($conferences) {
        return app(ClientController::class)->register($conferences,$id);
    })->name('register');

});


// //employee
// Route::prefix('worker')->name('worker.')->group(function () {
//     Route::get('conferences');
//     Route::get('conferences/show');
// });

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('conferences', ArticlesController::class);
// });
