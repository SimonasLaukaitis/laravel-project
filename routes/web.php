<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

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

// Globalus duomenų masyvas su straipsnių informacija
// $posts = [
//     1 => [
//         'title' => 'First article',
//         'content' => 'First article content',
//         'is_new' => false,
//         'authors' => [
//             1 => [
//                 'name' => 'Authorname_1',
//                 'surname' => 'Authorsurname_1'
//             ],
//             2 => [
//                 'name' => 'Authorname_2',
//                 'surname' => 'Authorsurname_2'
//             ]
//         ]
//     ],
//     2 => [
//         'title' => 'Second article',
//         'content' => 'Second article content',
//         'is_new' => true,
//         'authors' => [
//             1 => [
//                 'name' => 'Authorname_3',
//                 'surname' => 'Authorsurname_3'
//             ],
//             2 => [
//                 'name' => 'Authorname_4',
//                 'surname' => 'Authorsurname_4'
//             ]
//         ]
//     ],
//     3 => [
//         'title' => 'Third article',
//         'content' => 'Third article content',
//         'is_new' => false,
//         'authors' => [
//             1 => [
//                 'name' => 'Authorname_5',
//                 'surname' => 'Authorsurname_5'
//             ],
//             2 => [
//                 'name' => 'Authorname_6',
//                 'surname' => 'Authorsurname_6'
//             ]
//         ]
//     ]
// ];

// Route::get('/', function () {
//     // dd(route('home.index'));
//     return 'welcome to homepage';
// })->name('home.index');

// Route::get('/contact', function () {
//     return 'Contact';
// })->name('home.contact');

// Route::get('/articles/{id}', function ($id) {
//     //dvigubos kabutes
//     return "articles $id";
// });

// Route::get('/articles/recent/{id}', function ($days) {
//     //dvigubos kabutes
//     return "Article from $days days ago";
// });

// Route::get('/articles/recent/{id?}', function ($days=25) {
//     //dvigubos kabutes
//     return "Article from $days days ago";
// });

// Route::get('/articles/{id}', function ($id) {
//     //dvigubos kabutes
//     return "articles $id";
// })->where(['id' => '[0-9]+']); //su reg exp darom kad rastu tik skaicius 

// Route::get('/articles/2', function () {
//     return 'articles2';
// })->name('home.contact');

// Route::get('/articles/recent/{id?}', function ($days=25) {
//     //dvigubos kabutes
//     return "Article from $days days ago";
// })->name('articles.show');

// Route::get('/articles/{id}', function ($id) {
//     //dvigubos kabutes
//     return "Article  $id ";
// })->name('articles.show');

//sugrupuoti
// Route::prefix('articles')->name('articles.')->group(function () {
//     Route::get('/recent/{id?}', function ($days = 25) {
//         //dvigubos kabutes
//         return "Article from $days days ago";
//     })->name('recent');

//     Route::get('/{id}', function ($id) {
//         //dvigubos kabutes
//         return "Article  $id ";
//     })->name('show');
// });

// 1 uzduotis pasiekiam masyva

// Route::get('/posts', function () use ($posts) {
//     $result = '';

//     foreach ($posts as $post) {
//         $result .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
//     }

//     return $result;
// })->name('posts.index');

// 2 uzduotis

// Route::get('/posts/{id}', function (int $id) use ($posts) {
//     if (isset($posts[$id])) {
//         return "<h3>{$posts[$id]['title']}</h3><p>{$posts[$id]['content']}</p>";
//     }

//     return 'Post not found';
// })->name('posts.show');

// 3 uzduotis

// Route::get('posts/author/{postId}/{authorId}', function (int $postId, int $authorId) use ($posts) {
//     if (isset($posts[$postId]['authors'][$authorId])) {

//         return "<h3>{$posts[$postId]['title']}</h3>" .
//             "<p>Author: {$posts[$postId]['authors'][$authorId]['name']}," .
//             " {$posts[$postId]['authors'][$authorId]['surname']}</p>";
//     }

//     return 'Post not found';
// })->name('posts.author');

// 4 uzduotis

// Route::get('/posts/newest/{isNew?}', function (bool $isNew = false) use ($posts) {
//     $response = "";

//     foreach ($posts as $post) {
//         if ($isNew) {
//             if ($post['is_new']) {
//                 $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
//             }
//         } else {
//             $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
//         }
//     }

//     return $response;
// })->name('posts.newest');

// 5 uzduotis

// ne pilna
// Route::prefix('posts')->name('posts.')->group(function () use ($posts) {
//     Route::get('/', function () use ($posts) {
//         $result = '';

//         foreach ($posts as $post) {
//             $result .= "<h4>{$post['title']}</h4><p>{$post['content']}</p>";
//         }

//         return $result;
//     })->name('index');
// });


// BLADE views
// Route::get('/', function () {
//     //   kelias be blade.php
//     return view('home.index');
// })->name('home.index');

// Route::get('/contact', function () {
//     //   kelias be blade.php
//     return view('home.contact');
// })->name('home.contact');

//Alternatyva aukstesniam Route dviems
// Route::view('/contact','home.contact');
// Route::view('/contact','home.contact');

// Route::prefix('articles')->name('articles.')->group(function () use ($posts) {

//     Route::get('recent/{days?}', function ($days = 25) use ($posts) {
//         return "Articles from $days ago";
//     })->name('recent');

//     Route::get('{id}',function($id){

//         $articles = [
//             1=>[
//                 'title' => 'Title 1',
//                 'content' => 'Content 1'
//             ],
//             2=>[
//                 'title' => 'Title 2',
//                 'content' => 'Content 2'
//             ]
//         ];

//         //apsauga, jei nera articlo tokio
//         abort_if(!isset($articles[$id]), 404 ); 

//         return view('articles.show',['article' => $articles[$id]]);
//     })->name('show');
// });

// $users = [
//     1 => [
//         'id' => '1',
//         'name' => 'Jonas',
//         'surname' => 'Jonaitis',
//         'birthday' => '1995-03-11',
//         'cart' => [
//             'keyword' =>'leather_jacket',
//             'color' => 'black'
//         ]
//     ],
//     35 => [
//         'id' => '35',
//         'name' => 'Ona',
//         'surname' => 'Onaitė',
//         'birthday' => '1990-07-20',
//         'cart' => [
//             'keyword' =>'leather_trausers',
//             'color' => 'white'
//         ]
//     ],

// ];

// Route::get('/user/{id}',function(int $id) use ($users){
//    if(Carbon::parse($users[$id]['birthday'])->age > 13){
//         return redirect()->route('dashbord');
//    }

//    abort(403);
// })->name('user');

// Route::get('/user/{id}/cart', function(int $id) use ($user){
//     return response('success, 200')->cookie('USER_CART', json_encode($users[$id]['cart'], 3600 );)
// })->name('user.cart');

// Route::view('/','home.index')->name('dashboard');

// Route::prefix('/user')->name('user.')->group(function() use ($users) {

//     Route::get('/{id}', function (int $id) use ($users) {
//         if (Carbon::parse($users[$id]['birthday'])->age > 13) {
//             return redirect()->route('dashboard');
//         };

//         abort(403);
//     })->name('age');

//     Route::get('/{id}/cart', function (int $id) use ($users) {
//         return response('success', 200)->cookie('USER_CART', json_encode($users[$id]['cart']), 3600);
//     })->name('cart');

// });

// Route::get('lecture/query', function(Request $request){
//     return response()->json($request->query());
// });

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
        'location' => 'Vilnius',
        'event_name' => 'Christmas Conference',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '1990-12-25'
    ],
    2 => [
        'location' => 'Riga',
        'event_name' => 'Baltic Tech Summit',
        'registered_users' => [
        ],
        'event_date' => '2023-09-15'
    ],
    3 => [
        'location' => 'London',
        'event_name' => 'AI Innovation Forum',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2023-11-10'
    ],
    4 => [
        'location' => 'New York',
        'event_name' => 'Tech Expo',
        'registered_users' => [
            'Jonas Jonaitis',
            'Petras Petraitis'
        ],
        'event_date' => '2024-03-25'
    ],
    5 => [
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


Route::view('/', 'home.index')->name('dashboard');

// //client routes
// Route::view('/client', 'client.conferences')->name('client_conferences');
// Route::view('/client/conferences/show', 'conferences.show')->name('client_show');
// Route::view('/client/conferences/register', 'conferences.register')->name('client_register');

// //worker routes
// Route::view('worker/conferences/show', 'conferences.show')->name('worker_show');

// // admin routes????
// Route::view('/conferences', 'conferences.conferences')->name('conferences');
// Route::view('/conferences/show', 'conferences.show')->name('show');
// Route::view('/conferences/register', 'conferences.register')->name('register');


Route::resource('article', ArticlesController::class)->only(['index', 'show']);

//client
Route::prefix('client')->name('client.')->group(function () use ($conferences) {


    Route::get('conferences', function () use ($conferences) {
        app()->setLocale('lt');
        return view('client.conferences', ['conferences' => $conferences]);
    })->name('client.conferences');

    Route::get('conferences/show/{id}', function ($id) use ($conferences){
        app()->setLocale('lt');

        if (array_key_exists($id, $conferences)) {
            return view('client.show', ['conf' => $conferences[$id]]);
        } else {
            return 'Konferencija nerasta';
        }

    })->name('client.show');


    Route::get('conferences/register');
});

//employee
Route::prefix('worker')->name('worker.')->group(function () {
    Route::get('conferences');
    Route::get('conferences/show');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('conferences', ArticlesController::class);
});
