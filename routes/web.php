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

// Globalus duomenų masyvas su straipsnių informacija
$posts = [
    1 => [
        'title' => 'First article',
        'content' => 'First article content',
        'is_new' => false,
        'authors' => [
            1 => [
                'name' => 'Authorname_1',
                'surname' => 'Authorsurname_1'
            ],
            2 => [
                'name' => 'Authorname_2',
                'surname' => 'Authorsurname_2'
            ]
        ]
    ],
    2 => [
        'title' => 'Second article',
        'content' => 'Second article content',
        'is_new' => true,
        'authors' => [
            1 => [
                'name' => 'Authorname_3',
                'surname' => 'Authorsurname_3'
            ],
            2 => [
                'name' => 'Authorname_4',
                'surname' => 'Authorsurname_4'
            ]
        ]
    ],
    3 => [
        'title' => 'Third article',
        'content' => 'Third article content',
        'is_new' => false,
        'authors' => [
            1 => [
                'name' => 'Authorname_5',
                'surname' => 'Authorsurname_5'
            ],
            2 => [
                'name' => 'Authorname_6',
                'surname' => 'Authorsurname_6'
            ]
        ]
    ]
];

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
Route::view('/contact','home.contact');
Route::view('/contact','home.contact');

Route::prefix('articles')->name('articles.')->group(function () use ($posts) {

    Route::get('recent/{days?}', function ($days = 25) use ($posts) {
        return "Articles from $days ago";
    })->name('recent');

    Route::get('{id}',function($id){

        $articles = [
            1=>[
                'title' => 'Title 1',
                'content' => 'Content 1'
            ],
            2=>[
                'title' => 'Title 2',
                'content' => 'Content 2'
            ]
        ];
        
        //apsauga, jei nera articlo tokio
        abort_if(!isset($articles[$id]), 404 ); 

        return view('articles.show',['article' => $articles[$id]]);
    })->name('show');
});
