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

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['authAdmin'])->name('dashboard');

Route::get('/charts', [\App\Http\Controllers\ChartController::class, 'index'])->name('charts');

Route::get('/posts/{post}/admin', [\App\Http\Controllers\PostController::class, 'adminEdit'])->middleware(['authAdmin'])->name('posts.admin.edit');

Route::get('/dashboard/filter', [\App\Http\Controllers\DashboardController::class, 'filterPost'])->middleware(['authAdmin'])->name('dashboard.filter');

Route::get('/posts/{post}/update/status', [\App\Http\Controllers\PostController::class, 'updateStatus'])->middleware('auth')->name('posts.update.status');

Route::get('/posts/{post}/delete/images' , [\App\Http\Controllers\PostController::class, 'deleteAllImages'])->middleware(['auth'])->name('posts.delete.images');

Route::get('/posts/{post}/delete/admin', [\App\Http\Controllers\PostController::class, 'deleteAdmin'])->middleware(['authAdmin'])->name('posts.admin.delete');

Route::get('/tags/organization/{tag}', [\App\Http\Controllers\TagController::class, 'showOrganization'])->name('tags.organization.show');

Route::get('/searchByTitle/', [\App\Http\Controllers\PostController::class, 'searchByTitle'])->name('searchByTitle');

require __DIR__.'/auth.php';

Route::post('/posts/{post}/comments/store', [\App\Http\Controllers\PostController::class, 'storeComment'])
    ->name('posts.comments.store');

Route::resource('/posts', \App\Http\Controllers\PostController::class);

Route::resource('/tags', \App\Http\Controllers\TagController::class);

Route::get('/my_posts', [\App\Http\Controllers\PostController::class, 'my_posts'])->middleware('auth')->name('my_posts');
