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
    return redirect()->route('products.index');
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

Route::resource('/products', \App\Http\Controllers\ProductController::class);

Route::get('/orders/me', [\App\Http\Controllers\OrderController::class, 'me'])->middleware(['auth'])
    ->name('orders.me');

Route::get('/orders/show/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->middleware(['auth'])
    ->name('orders.show');

Route::post('/orders/{product}', [\App\Http\Controllers\OrderController::class, 'makeOrder'])
    ->name('orders.make');

Route::get('/orders/cancel/{order}', [\App\Http\Controllers\OrderController::class, 'cancelOrder'])->middleware(['auth'])
    ->name('orders.cancel');

Route::get('/orders/finish/{order}', [\App\Http\Controllers\OrderController::class, 'finishOrder'])->middleware(['authAdmin'])
    ->name('orders.finish');

Route::get('/invoices/{order}', [\App\Http\Controllers\InvoiceController::class, 'issueInvoice'])->middleware(['authAdmin'])
    ->name('invoices.issueInvoice');

Route::get('/boms/create', [\App\Http\Controllers\BomController::class, 'create'])->middleware(['authAdmin'])
    ->name('boms.create');

Route::post('/boms', [\App\Http\Controllers\BomController::class, 'store'])->middleware(['authAdmin'])
    ->name('boms.store');

Route::get('/materials', [\App\Http\Controllers\MaterialController::class, 'index'])->middleware(['authAdmin'])
    ->name('materials.index');

Route::post('/materials', [\App\Http\Controllers\MaterialController::class, 'store'])->middleware(['authAdmin'])
    ->name('materials.store');

Route::get('/manufacture', [\App\Http\Controllers\ManufactureController::class, 'create'])->middleware(['authAdmin'])
    ->name('manufactures.create');

Route::post('/manufacture', [\App\Http\Controllers\ManufactureController::class, 'store'])->middleware(['authAdmin'])
    ->name('manufactures.store');

Route::resource('/tags', \App\Http\Controllers\TagController::class);

Route::get('/my_posts', [\App\Http\Controllers\PostController::class, 'my_posts'])->middleware('auth')->name('my_posts');
