<?php


// use Illuminate\Support\Facades\Auth;
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


//Main
Route::group([
    'namespace' => 'App\Http\Controllers\Main'
    ],  function(){
            Route::get('/', IndexController::class)->name('main.index');
    }
);

//Post
Route::group([
    'namespace' => 'App\Http\Controllers\Post',
    'prefix' => 'posts'
    ],  function(){
            Route::get('/', IndexController::class)->name('post.index');
            Route::get('/{post}', ShowController::class)->name('post.show');

            Route::group([
                'namespace' => 'Comment',
                'prefix' => '{post}/comments' 
            ], function(){
                Route::post('/', StoreController::class)->name('post.comment.store');
            });

            Route::group([
                'namespace' => 'Like',
                'prefix' => '{post}/likes' 
            ], function(){
                Route::post('/', StoreController::class)->name('post.like.store');
            });
    }
);

//Personal
Route::group([
    'namespace' => 'App\Http\Controllers\Personal',
    'prefix' => 'personal',
    'middleware' => ['auth', 'verified'],
    ],  function(){
            Route::group(['namespace' => 'Main', 'prefix' => 'main'], function(){
                Route::get('/', IndexController::class)->name('personal.main.index');
            });
            Route::group(['namespace' => 'Liked', 'prefix' => 'likes'], function(){
                Route::get('/', IndexController::class)->name('personal.liked.index');
                Route::delete('/{post}', DeleteController::class)->name('personal.liked.delete');
            });
            Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function(){
                Route::get('/', IndexController::class)->name('personal.comment.index');
                Route::get('/{comment}', EditController::class)->name('personal.comment.edit');
                Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');
                Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
            });
});

//Admin
Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin', 'verified'],
    ],  function(){
            //admin.main
            Route::group(['namespace' => 'Main'], function(){
                Route::get('/', IndexController::class)->name('admin.main.index');
            });

            //admin.category
            Route::group(['namespace' => 'Categories', 'prefix' => 'categories'], function(){
                Route::get('/', IndexController::class)->name('admin.categories.index');
                Route::get('/create', CreateController::class)->name('admin.categories.create');
                Route::post('/', StoreController::class)->name('admin.categories.store');
                Route::get('/{category}', ShowController::class)->name('admin.categories.show');
                Route::get('/{category}/edit', EditController::class)->name('admin.categories.edit');
                Route::patch('/{category}', UpdateController::class)->name('admin.categories.update');
                Route::delete('/{category}', DeleteController::class)->name('admin.categories.delete');
            });
            
            //admin.tag
            Route::group(['namespace' => 'Tags', 'prefix' => 'tags'], function(){
                Route::get('/', IndexController::class)->name('admin.tag.index');
                Route::get('/create', CreateController::class)->name('admin.tag.create');
                Route::post('/', StoreController::class)->name('admin.tag.store');
                Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
                Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
                Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
                Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
            });

            //admin.post
            Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function(){
                Route::get('/', IndexController::class)->name('admin.post.index');
                Route::get('/create', CreateController::class)->name('admin.post.create');
                Route::post('/', StoreController::class)->name('admin.post.store');
                Route::get('/{post}', ShowController::class)->name('admin.post.show');
                Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
                Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
                Route::delete('/{post}', DeleteController::class)->name('admin.post.delete');
            });

            //admin.user
            Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
                Route::get('/', IndexController::class)->name('admin.user.index');
                Route::get('/create', CreateController::class)->name('admin.user.create');
                Route::post('/', StoreController::class)->name('admin.user.store');
                Route::get('/{user}', ShowController::class)->name('admin.user.show');
                Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
                Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
                Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
            });

});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
