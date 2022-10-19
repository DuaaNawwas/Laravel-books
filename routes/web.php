<?php

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// // All Books
Route::get('/', [BooksController::class, 'index']);
Route::get('/dashboard', [BooksController::class, 'dash'])->can('admin');
// Route::get('/books', [BooksController::class, 'index']);

// // Create Form
// Route::get('/books/create', [BooksController::class, 'create'])->name('create');

// // Store Book Data from Form
// Route::post('/books', [BooksController::class, 'store']);


// // Show Single Book
// Route::get('/books/{id}', [BooksController::class, 'show']);


// Routes for all Books related Pages
Route::resource('/books', BooksController::class);


// ---------------------Routes for Registration-----------------------------
// Show Register Form
Route::get('/register', [UsersController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UsersController::class, 'store']);

// Log User Out
Route::post('/logout', [UsersController::class, 'logout']);

// Show Login Form 
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('users/authenticate', [UsersController::class, 'authenticate']);

// Show a Message to Newly Registered Users to Verify Their Email
Route::get('/email/verify', function () {
    return view('users.verify-email');
    // dd('yes');
})->middleware('auth')->name('verification.notice');

// Verify email When link is clicked

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend Verification Email

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// -------------------------------------------------------------------------

// Show Deleted Items Page
Route::get('/trash', [BooksController::class, 'trash'])->middleware(['auth', 'verified']);

// Show author information
Route::get('/author/{id}', [BooksController::class, 'author']);

// Show sorted Books
Route::get('/{sort?}', [BooksController::class, 'sort']);

// Force Delete an Item
Route::delete('/forcedelete/{id}', [BooksController::class, 'forceDelete'])->can('forceDelete', Book::class);
// 
// Restore a Deleted Item
Route::get('/restore/{id}', [BooksController::class, 'restore']);
