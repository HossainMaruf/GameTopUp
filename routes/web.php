<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;


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


// users routes
Route::get('/', function () {
    // $posts = Post::all();
    $posts = DB::table('posts')->paginate(4);
    $posts->withPath('/');
    return view('users.home', compact('posts'));
});

// Get the single post
Route::get("/post/{id}", function($id) {
    $post = Post::where("id", $id)->first();
    return view('users.single', compact('post'));
});

// admin routes
Route::get('/admin', ['middleware' => 'admin_login', function () {
    return view('admin.index');
}]);

/**
 * Admin Post Start
 */

// GET ALL POSTS
Route::get('/admin/posts', [PostsController::class, 'index']);
// GET POST
Route::get('/admin/post/create', [PostsController::class, 'create']);
// CREATE POST
Route::post('/admin/post/create', [PostsController::class, 'store']);
// EDIT POST
Route::get('/admin/post/edit/{id}', [PostsController::class, 'edit']);
Route::post('/admin/post/update/{id}', [PostsController::class, 'update']);
// DELETE POST
Route::get('/admin/post/delete/{id}', [PostsController::class, 'destroy']);


/**
 * Admin Post End
 */

// auth routes
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);
