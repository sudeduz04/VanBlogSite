<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('', [HomeController::class, 'show'])->name('front.show');
Route::get('/postDetail/{id}', [HomeController::class, 'postDetail'])->name('front.postDetail');
Route::post('/postLike/{id}', [HomeController::class, 'postLike'])->name('front.postLike');
Route::post('/postComment/{id}', [HomeController::class, 'postComment'])->name('front.postComment');
Route::get('/deleteComment/{id}', [HomeController::class, 'deleteComment'])->name('front.deleteComment');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])
    ->prefix('panel')
    ->group(function () {
        Route::get('', [AdminPanelController::class, 'index'])->name('panel.index');
        Route::get('/addCategory', [AdminPanelController::class, 'addCategory'])->name('panel.addCategory');
        Route::post('/addCategoryPost', [AdminPanelController::class, 'addCategoryPost'])->name('panel.addCategoryPost');
        Route::get('/categoryList', [AdminPanelController::class, 'categoryList'])->name('panel.categoryList');
        Route::get('/addContent', [AdminPanelController::class, 'addContent'])->name('panel.addContent');
        Route::post('/addContentPost', [AdminPanelController::class, 'addContentPost'])->name('panel.addContentPost');
        Route::get('/contentList', [AdminPanelController::class, 'contentList'])->name('panel.contentList');
        Route::get('/updateCategory/{id}', [AdminPanelController::class, 'updateCategory'])->name('panel.updateCategory');
        Route::post('/updateCategoryPost', [AdminPanelController::class, 'updateCategoryPost'])->name('panel.updateCategoryPost');
        Route::get('/deleteCategory/{id}', [AdminPanelController::class, 'deleteCategory'])->name('panel.deleteCategory');
        Route::get('/updateContent/{id}', [AdminPanelController::class, 'updateContent'])->name('panel.updateContent');
        Route::post('/updateContentPost', [AdminPanelController::class, 'updateContentPost'])->name('panel.updateContentPost');
        Route::get('/deleteContent/{id}', [AdminPanelController::class, 'deleteContent'])->name('panel.deleteContent');
    });

