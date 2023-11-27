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

// 1 uzduotis

Route::get('/posts', function () use ($posts) {
    $response = '';

    foreach ($posts as $post) {
        $response .= "<h3>{$post['title']}</h3><p>{$post['content']}</p>";
    }

    return $response;
})->name('posts.index');


Route::get('/', function () {
    return view('welcome');
});
