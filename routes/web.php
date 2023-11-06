<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedBackController;

use Illuminate\Support\Facades\Route;

Route::post('/store', [AjaxCrudController::class, 'store']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'register'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(
    ['middleware' => ['auth']],
    function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(FeedBackController::class)->as('feedback.')->group(function ()
        {
            Route::get('feedback', 'index')->name('index');
            Route::get('feedback/create', 'create')->name('create')->middleware('is_admin');
            Route::post('feedback/store', 'store')->name('store')->middleware('is_admin');
            Route::post('feedback/store_feedback_comment', 'storeFeedbackComment')->name('store_feedback_comment');
        });


        Route::controller(CommentController::class)->as('comment.')->group(function ()
        {
            Route::get('comment', 'index')->name('index');
            Route::post('comment/status', 'statusChange')->name('status')->middleware('is_admin');

        });

    }
);