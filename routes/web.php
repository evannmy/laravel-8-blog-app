<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return view('index', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/about', function() {
    return view('about', [
        'title' => 'About',
        'active' => 'about'
    ]);
});

// Route::get('/blog', function() {
//     return view('blog', [
//         'title' => 'Blogs',
//         'blogPosts' =>  Post::all()
//     ]);
// });

// Route::get('/blog/{slug}', function($slug) {
//     return view('post', [
//         'title' => 'Post Detail',
//         'post' =>  Post::find($slug)
//     ]);
// });

Route::get('/blog', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registration', [RegistrationController::class, 'index'])->middleware('guest');
Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/createSlug', [DashboardPostController::class, 'createSlug'])->middleware('auth');

Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('dashboard/categories', AdminCategoryController::class)->middleware(['auth', 'admin']);