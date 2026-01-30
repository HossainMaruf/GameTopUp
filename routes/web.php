<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UsersPostsController;;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


/**
 * User Routes Start
 */

/* ==================== User Post Controller Start ========================= */

// Load home page
Route::get('/', [UsersPostsController::class, 'index']);
// Get the single post
Route::get("/post/{id}", [UsersPostsController::class, 'getSinglePost']);

/* ==================== User Post Controller End ========================= */





/* ==================== Comment Controller Start ========================= */

// Comment on a specific post
Route::post('/comment/{id}', [CommentController::class, 'store']);
// Reply on a specific comment
Route::post('/reply/{post_id}/{parent_id}', [CommentController::class, 'storeReply']);

/* ===================== Comment Controller End ================== */





/* ===================== User Auth Controller Start ================== */

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'index']);
Route::get('/logout', [AuthController::class, 'getLogout']);
Route::post('/logout', [AuthController::class, 'logout']);

// Email Verification
// Notify the user that Email is sent
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Get the click response back
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend the verfication Email 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/* ===================== User Auth Controller End ================== */


/**
 * User Routes End
 */



/**
 * Admin Routes Start
 */


/* ===================== Admin Post Controller Start ================== */

// Load the admin Dashboard
Route::get('/admin', ['middleware' => 'admin_login', function () {
    return view('admin.index');
}]);

// GET ALL POSTS
Route::get('/admin/posts', [PostsController::class, 'index']);
// GET TRASH POSTS
Route::get('/admin/trash', [PostsController::class, 'getTrashPosts']);
// Move a POST to Trash Section
Route::get('/admin/trash/{id}', [PostsController::class, 'makeTrashPost']);
// Trash Post Restoring
Route::get('/admin/restore/{id}', [PostsController::class, 'restorePost']);
// GET POST
Route::get('/admin/post/create', [PostsController::class, 'create']);
// CREATE POST
Route::post('/admin/post/create', [PostsController::class, 'store']);
// EDIT POST
Route::get('/admin/post/edit/{id}', [PostsController::class, 'edit']);
Route::post('/admin/post/update/{id}', [PostsController::class, 'update']);
// DELETE POST
Route::get('/admin/post/delete/{id}', [PostsController::class, 'destroy']);

/* ===================== Admin Post Controller End ================== */


/**
 * Admin Routes End
 */
