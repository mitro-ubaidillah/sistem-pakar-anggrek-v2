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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view ('about', [
        "title" => "About",
        "nama" => "Mitro",
        "email" => "mitro@gmail.com"
    ]);
});


Route::get('/blog', function () {
    $blog_post = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "author" => "Mitro",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt et eius fugiat at. 
            Repudiandae necessitatibus consequatur sequi quam perspiciatis error dolore, 
            debitis rerum velit tenetur maxime ratione quae adipisci autem!"
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Ubaid",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt et eius fugiat at. 
            Repudiandae necessitatibus consequatur sequi quam perspiciatis error dolore, 
            debitis rerum velit tenetur maxime ratione quae adipisci autem!"
        ]
    ];

    return view('posts', [
        "title" => "Blog",
        "posts" => $blog_post
    ]);
});

// route single post
Route::get('/blog/{slug}', function($slug){
    $all_post = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "author" => "Mitro",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt et eius fugiat at. 
            Repudiandae necessitatibus consequatur sequi quam perspiciatis error dolore, 
            debitis rerum velit tenetur maxime ratione quae adipisci autem!"
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Ubaid",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt et eius fugiat at. 
            Repudiandae necessitatibus consequatur sequi quam perspiciatis error dolore, 
            debitis rerum velit tenetur maxime ratione quae adipisci autem!"
        ]
    ];

    $new_post = [];
    
    foreach($all_post as $post){
        if ($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('post',[
        "title" => "Single Post",
        "single_post" => $new_post
    ]);
});