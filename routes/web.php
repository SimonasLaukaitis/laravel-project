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

// $users = [
//     1 => [
//         'id' => '1',
//         'user_type' => 'client',
//         'name' => 'Jonas',
//         'surname' => 'Jonaitis',
//         'email' => 'jonas@example.com',
//     ],
//     2 => [
//         'id' => '2',
//         'user_type' => 'worker',
//         'name' => 'Petras',
//         'surname' => 'Petraitis',
//         'email' => 'petras@example.com',
//     ],
//     3 => [
//         'id' => '3',
//         'user_type' => 'admin',
//         'name' => 'Vardenis',
//         'surname' => 'Pavardenis',
//         'email' => 'vardenis@example.com',
//     ],
//     4 => [
//         'id' => '4',
//         'user_type' => 'client',
//         'name' => 'Laura',
//         'surname' => 'Lauraitė',
//         'email' => 'laura@example.com',
//     ],
//     5 => [
//         'id' => '5',
//         'user_type' => 'worker',
//         'name' => 'Gabrielė',
//         'surname' => 'Gabraitė',
//         'email' => 'gabriele@example.com',
//     ],
//     6 => [
//         'id' => '6',
//         'user_type' => 'admin',
//         'name' => 'Tomas',
//         'surname' => 'Tomauskas',
//         'email' => 'tomas@example.com',
//     ],
//     7 => [
//         'id' => '7',
//         'user_type' => 'client',
//         'name' => 'Elena',
//         'surname' => 'Elenaitė',
//         'email' => 'elena@example.com',
//     ],
//     8 => [
//         'id' => '8',
//         'user_type' => 'worker',
//         'name' => 'Marius',
//         'surname' => 'Mariūnas',
//         'email' => 'marius@example.com',
//     ],
//     9 => [
//         'id' => '9',
//         'user_type' => 'admin',
//         'name' => 'Rasa',
//         'surname' => 'Rasaitė',
//         'email' => 'rasa@example.com',
//     ],
//     10 => [
//         'id' => '10',
//         'user_type' => 'client',
//         'name' => 'Justinas',
//         'surname' => 'Justinauskas',
//         'email' => 'justinas@example.com',
//     ],
// ];



// $conferences = [
//     1 => [
//         'id' => '1',
//         'location' => 'Vilnius',
//         'event_name' => 'Christmas Conference',
//         'registered_users' => [
//             'Alice Smith',
//             'Bob Johnson',
//             'Charlie Brown'
//         ],
//         'event_date' => '1990-12-25',
//         'info' => 'The Christmas Conference is a festive gathering in Vilnius, celebrating the holiday spirit with tech enthusiasts and industry leaders.'
//     ],
//     2 => [
//         'id' => '2',
//         'location' => 'Riga',
//         'event_name' => 'Baltic Tech Summit',
//         'registered_users' => [],
//         'event_date' => '2024-09-15',
//         'info' => 'The Baltic Tech Summit aims to bring together innovators and entrepreneurs from the Baltic region, fostering collaboration and technological advancements.'
//     ],
//     3 => [
//         'id' => '3',
//         'location' => 'London',
//         'event_name' => 'AI Innovation Forum',
//         'registered_users' => [
//             'Frank Miller',
//             'Grace Wilson'
//         ],
//         'event_date' => '2023-11-10',
//         'info' => 'The AI Innovation Forum in London serves as a platform for discussing the latest trends and breakthroughs in artificial intelligence, gathering experts and visionaries.'
//     ],
//     4 => [
//         'id' => '4',
//         'location' => 'New York',
//         'event_name' => 'Tech Expo',
//         'registered_users' => [
//             'Henry White',
//             'Isabella Martinez',
//             'Jack Brown',
//             'Katherine Lee'
//         ],
//         'event_date' => '2024-03-25',
//         'info' => 'The Tech Expo in New York showcases cutting-edge technologies and provides a stage for tech enthusiasts to explore innovations across various industries.'
//     ],
//     5 => [
//         'id' => '5',
//         'location' => 'San Francisco',
//         'event_name' => 'Developer Conference',
//         'registered_users' => [
//             'Liam Johnson',
//             'Mia Garcia',
//             'Noah Taylor'
//         ],
//         'event_date' => '2024-06-05',
//         'info' => 'The Developer Conference in San Francisco is a hub for developers, offering insights into the latest tools, languages, and best practices in software development.'
//     ],
//     6 => [
//         'id' => '6',
//         'location' => 'Berlin',
//         'event_name' => 'Blockchain Summit',
//         'registered_users' => [
//             'Oliver Schmidt',
//             'Sophie Wagner',
//             'Lucas Müller'
//         ],
//         'event_date' => '2023-08-18',
//         'info' => 'The Blockchain Summit in Berlin convenes industry experts and enthusiasts to explore the potential of blockchain technology and its applications.'
//     ],
//     7 => [
//         'id' => '7',
//         'location' => 'Tokyo',
//         'event_name' => 'Gaming Expo',
//         'registered_users' => [
//             'Yuki Tanaka',
//             'Haruto Sato',
//             'Airi Yamamoto',
//             'Ren Nagano'
//         ],
//         'event_date' => '2023-10-30',
//         'info' => 'The Gaming Expo in Tokyo showcases the latest trends and innovations in the gaming industry, bringing together developers, publishers, and gamers.'
//     ],
//     8 => [
//         'id' => '8',
//         'location' => 'Sydney',
//         'event_name' => 'Digital Marketing Conference',
//         'registered_users' => [
//             'Ella Wilson',
//             'Connor Thompson'
//         ],
//         'event_date' => '2024-05-12',
//         'info' => 'The Digital Marketing Conference in Sydney offers insights into effective digital marketing strategies, trends, and tools for marketers.'
//     ],
//     9 => [
//         'id' => '9',
//         'location' => 'Paris',
//         'event_name' => 'Fashion Tech Forum',
//         'registered_users' => [
//             'Aurélie Dubois',
//             'Louis Lambert',
//             'Chloé Martin'
//         ],
//         'event_date' => '2023-09-20',
//         'info' => 'The Fashion Tech Forum in Paris explores the intersection of fashion and technology, showcasing innovations shaping the future of the fashion industry.'
//     ],
//     10 => [
//         'id' => '10',
//         'location' => 'Singapore',
//         'event_name' => 'Data Science Summit',
//         'registered_users' => [
//             'Ethan Lim',
//             'Sophia Ng',
//             'Aiden Tan',
//             'Amelia Goh'
//         ],
//         'event_date' => '2024-07-08',
//         'info' => 'The Data Science Summit in Singapore brings together data scientists and analysts to share insights, techniques, and advancements in data science.'
//     ],
//     // More conferences can be added here following the same format
// ];

app()->setLocale('lt');

//Index page
Route::get('/', function () {
    return view('index');
})->name('index');

//success page
Route::get('/success', function () {
    return view('success');
 })->name('success');
 
 // client
 Route::prefix('client')->name('client.')->group(function () {
  
    Route::get('/conferences', function () {
        return app(ClientController::class)->index(Conference::all());
    })->name('conferences');
 
    Route::get('/conferences/show/{id}', function ($id) {
        return app(ClientController::class)->show(Conference::findOrFail($id));
    })->name('show');
 
    Route::get('/conferences/register/{id}', function ($id) {
        return app(ClientController::class)->register(Conference::findOrFail($id));
    })->name('register');
 
 });
 
 // Worker
 Route::prefix('worker')->name('worker.')->group(function () {
 
    Route::get('/conferences', function () {
        return app(WorkerController::class)->index(Conference::all());
    })->name('conferences');
 
    Route::get('/conferences/show/{id}', function ($id) {
        return app(WorkerController::class)->show(Conference::findOrFail($id));
    })->name('show');
    
 });
 
 // Admin
 Route::prefix('admin')->name('admin.')->group(function () {
 
    Route::get('/menu', function () {
        return app(AdminController::class)->index(User::all(), Conference::all());
    })->name('menu');
 
    Route::get('/menu/userlist', function () {
        return app(AdminController::class)->userList(User::all());
    })->name('userlist');
 
    Route::get('/menu/userlist/useredit/{id}', function ($id) {
        return app(AdminController::class)->userEdit(User::findOrFail($id));
    })->name('useredit');
 
    Route::get('/menu/userlist/conferencelist', function () {
        return app(AdminController::class)->showConferences(Conference::all());
    })->name('conferencelist');
 
    Route::get('/menu/userlist/conferencelist/newconference', function () {
        return app(AdminController::class)->newConference();
    })->name('newconference');
 
    Route::get('/menu/userlist/conferencelist/conferenceedit/{id}', function ($id) {
        return app(AdminController::class)->editConference(Conference::findOrFail($id));
    })->name('conferenceedit');
 
    // for storing new conference
    Route::post('/menu/userlist/conferencelist/store', [AdminController::class, 'storeConference'])->name('storeConference');
 });

