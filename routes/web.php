<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
})->name('home');*/

Route::get('/', [SiteController::class, 'index'])->name('site');

Route::get('products', [ProductController::class, 'allProducts'])->name('allProducts');





Route::group([
    'controller' => CartController::class,
    'as' => 'cart.',
    'prefix' => '/cart'
], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'createOrder')->middleware('auth')->name('createOrder');
    Route::get('/{product:id}/remove', 'remove')->name('remove');
});

Route::group(['controller' => ProductController::class, 'as' => 'product.', 'prefix' => '/products'], function () {
    Route::get('/{id}/addToCart', 'addToCart')->name('addToCart');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('user.store');

    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'loginAuth'])->name('login.auth');

    Route::get('forgot-password', function () {
        return view('user.forgot-password');
    })->name('password.request');

    Route::post('forgot-password', [UserController::class, 'forgotPasswordStore'])->name('password.email')->middleware('throttle:3,1');

    Route::get('reset-password/{token}', function (string $token) {
        return view('user.reset-password', ['token' => $token]);
    })->name(name: 'password.reset');

    Route::post('reset-password', [UserController::class, 'resetPasswordUpdate'])->name(name: 'password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', function () {
        return view('user.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:3,1')->name('verification.send');

    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

