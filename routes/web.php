<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;
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

// // All Books
Route::get('/', [BooksController::class, 'index']);
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
Route::get('/register', [UsersController::class, 'create']);

// Create New User
Route::post('/users', [UsersController::class, 'store']);

// Log User Out
Route::post('/logout', [UsersController::class, 'logout']);

// Show Login Form 
Route::get('/login', [UsersController::class, 'login'])->name('login');

// Login User
Route::post('users/authenticate', [UsersController::class, 'authenticate']);


// -------------------------------------------------------------------------

// Show Deleted Items Page
Route::get('/trash', [BooksController::class, 'trash'])->middleware('auth');

// Show author information
Route::get('/author/{id}', [BooksController::class, 'author']);

// Show sorted Books
Route::get('/{sort?}', [BooksController::class, 'sort']);

// Force Delete an Item
Route::delete('/forcedelete/{id}', [BooksController::class, 'forceDelete']);

// Restore a Deleted Item
Route::get('/restore/{id}', [BooksController::class, 'restore']);
