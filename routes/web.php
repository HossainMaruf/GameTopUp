<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
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
    return view('users.home');
});

// admin routes
Route::get('/admin', ['middleware' => 'admin_login', function () {
    return view('admin.index');
}]);
Route::get('/admin/posts', [PostsController::class, 'index']);
Route::get('/admin/post/create', [PostsController::class, 'create']);
Route::post('/admin/post/create', [PostsController::class, 'store']);

// auth routes
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'logout']);
