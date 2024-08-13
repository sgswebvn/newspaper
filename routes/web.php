<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;




Route::get('/', [ViewController::class, 'index'])->name('/');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'all'])->name('admin'); 
    Route::get('admin/category/index', [CategoryController::class, 'index'])->name('category');
    Route::get('admin/category/add', [CategoryController::class, 'create'])->name('add_category');
    Route::post('/add_cate', [CategoryController::class, 'store']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit_category');
    Route::post('/admin/category/update/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('delete_category');

    Route::get('admin/news/index', [NewsController::class, 'index'])->name('news');
    Route::get('admin/news/add', [NewsController::class, 'create'])->name('add_news');
    Route::post('/add', [NewsController::class, 'store']);
    Route::get('admin/news/edit/{id}', [NewsController::class, 'edit'])->name('edit_news');
    Route::post('/edit_news/{id}', [NewsController::class, 'update']);
    Route::get('admin/news/delete/{id}', [NewsController::class, 'destroy'])->name('delete_news');

    Route::get('admin/users/index', [AdminController::class, 'index'])->name('users');
    Route::get('admin/users/edit/{id}', [AdminController::class, 'edit'])->name('edit_users');
    Route::get('admin/users/delete/{id}', [AdminController::class, 'destroy'])->name('delete_users');

    Route::get('admin/comment/index', [AdminController::class, 'comment'])->name('comment');
    Route::get('news/details/comment/{id}', [AdminController::class, 'show'])->name('show'); 
});


Route::get('/home', [ViewController::class, 'index'])->name('home');
Route::get('/news/life/', [ViewController::class, 'life'])->name('life');
Route::get('/news/xh/', [ViewController::class, 'xh'])->name('xh');
Route::get('/news/travel/', [ViewController::class, 'travel'])->name('travel');
Route::get('/news/sport/', [ViewController::class, 'sport'])->name('sport');
Route::get('/news/details/{id}/', [ViewController::class, 'details'])->name('details');
Route::get('/search', [ViewController::class, 'search']);
Route::get('/search_admin', [NewsController::class, 'search']);
Route::post('/comment', [CommentController::class, 'store']);

Route::get('/abouts/', [ViewController::class, 'abouts'])->name('abouts');
Route::get('/contact/', [ViewController::class, 'contact'])->name('contact');
Route::post('/contact', [ViewController::class, 'store']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';

