<?php

use App\Http\Controllers\Blogcontroller;
use App\Models\Post;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('blog.index',[
        'posts' => Post::all()
    ]);
});

Route::prefix('/blog')->name('blog.')->controller(Blogcontroller::class) ->group(function(){
    Route::get('/',  'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/post/edit', 'edit')->name('edit');
    Route::post('/post/edit', 'update');
    Route::get('/{slug}-{post}',  'show'  )->where([
    'id' =>'[0-9]+',
    'slug' =>'[a-z0-9\-]+'
    ])->name('show');


});
