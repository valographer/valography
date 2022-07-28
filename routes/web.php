<?php

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Gast darf nur die Login-Seite sehen
Route::group(['middleware' => 'guest'], function(){
    Route::get('login', [SessionsController::class, 'create'])->name('login');
    Route::post('login', [SessionsController::class, 'store']);
});

// Eingeloggte Benutzer dürfen verschiedene Kategorien ansehen, sich ausloggen etc
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PostController::class, 'index'])->name('home');
    Route::get('posts/{category:slug}', [PostController::class, 'showCategory'])->name('category');
        
    Route::get('logout', [SessionsController::class, 'destroy'])->name('logout');

    // Admins dürfen Kategorien & Posts erstellen, neue Benutzer hinzufügen etc
    Route::group(['middleware' => 'admin'], function(){
        Route::get('admin/posts/create', [PostController::class, 'create']);
        Route::post('admin/posts/create', [PostController::class, 'store']);
        
        Route::get('admin/posts/edit', [PostController::class, 'edit']);
        Route::post('admin/posts/edit', [PostController::class, 'editPost']);
        Route::post('admin/posts/delete', [PostController::class, 'deletePost']);
        
        Route::get('admin/categories', [CategoryController::class, 'index']);
        Route::get('admin/categories/create', [CategoryController::class, 'create']);
        Route::post('admin/categories/create', [CategoryController::class, 'store']);
        Route::get('admin/categories/edit', [CategoryController::class, 'edit']);
        Route::post('admin/categories/edit', [CategoryController::class, 'editCategory']);

        Route::get('admin/users', [UsersController::class, 'index']);
        Route::get('admin/users/register', [UsersController::class, 'create'])->name('register');
        Route::post('admin/users/register', [UsersController::class, 'store']);
        Route::get('admin/users/edit', [UsersController::class, 'edit']);
        Route::post('admin/users/edit', [UsersController::class, 'editUser']);
        Route::post('admin/users/delete', [UsersController::class, 'deleteUser']);
    });
});
