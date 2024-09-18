<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HighController;
use App\Http\Controllers\Admin\LiveBroadcastController;
use App\Http\Controllers\Admin\SportsController;
use App\Http\Controllers\Admin\HighlightsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Middleware\UserActivity;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Highlight;
use Illuminate\Support\Facades\Auth;

// Route::get('/admin/dashboard', function () {
//     // Only users with 'admin' or 'superadmin' role can access this route
// })->middleware('role:admin,superadmin');










// Route::get('/adminrole', [UsersController::class, 'assignAdminRole'])->name('assign.admin.role');



Route::get('/login', [HighController::class, 'login'])->name('login');
Route::get('/adminlogin', [HighController::class, 'adminlogin'])->name('adminlogin');
Route::get('/signup', [HighController::class, 'signup'])->name('signup');
Route::get('/subscription', [HighController::class, 'subscription'])->name('subscription');



// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');





Route::middleware(['activestatus'])->group(function () {
    
// Route::get('/loggedinsearch', [HighController::class, 'loggedinsearch'])->name('loggedinsearch');
Route::get('/loggedinfootball', [HighController::class, 'loggedinfootballpage'])->name('loggedinfootballpage');
Route::get('/loggedinfootballtable', [HighController::class, 'loggedinfootballtable'])->name('loggedinfootballtable');
Route::get('/loggedinnews', [HighController::class, 'loggedinnews'])->name('loggedinnews');
Route::get('/loggedinhighlights', [HighController::class, 'loggedinhighlights'])->name('loggedinhighlights');
Route::get('/loggedinhighlightsmain/{id}', [HighController::class, 'loggedinhighlightsmain'])->name('loggedinhighlightsmain');
Route::get('/loggedinresults', [HighController::class, 'loggedinresults'])->name('loggedinresults');
Route::get('/loggedinsports', [HighController::class, 'loggedinsports'])->name('loggedinsports');
Route::get('/loggedinnewspage/{id}', [HighController::class, 'loggedinnewspage'])->name('loggedinnewspage');
Route::get('/loggedinhome', [HighController::class, 'loggedinhome'])->name('loggedinhome');
Route::get('/loggedinprofile', [HighController::class, 'loggedinprofile'])->name('loggedinprofile');
Route::get('/loggedineditprofile', [HighController::class, 'loggedineditprofile'])->name('loggedineditprofile');
Route::get('/loggedinwatchlive/{id}', [HighController::class, 'loggedinwatchlive'])->name('loggedinwatchlive');
Route::get('/loggedinlivesrightnow', [HighController::class, 'loggedinlivesrightnow'])->name('loggedinlivesrightnow');


});

Route::get('logout', [HighController::class, 'logout'])->name('logout');





Route::post('/login', [HighController::class, 'processLogin'])->name('login');
Route::post('/adminlogin', [HighController::class, 'adminloginstore'])->name('adminlogin');
Route::post('/signup', [HighController::class, 'processSignup'])->name('signup');
Route::post('/subscription', [HighController::class, 'subscriptionStore'])->name('subscription');




// Profile Update Route

Route::put('/loggedineditprofile', [HighController::class,'loggedinprofileUpdate'])->name('loggedinprofileUpdate');












Route::get('admin',[HighController::class, 'admin'])->name('admin')->middleware('role');
Route::prefix('admin')->middleware('role')->group(function () {
    // Routes that require authentication for the 'admin' prefix
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/create', [NewsController::class, 'create'])->name('admin.news.create');
        Route::post('/', [NewsController::class, 'store'])->name('admin.news.store');
        Route::get('/{id}', [NewsController::class, 'show'])->name('admin.news.show');
        Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
        Route::put('/{id}', [NewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
    });


    Route::prefix('subscriptions')->group (function () {
    // Subscription Routes
    Route::get('/', [SubscriptionController::class, 'index'])->name('admin.subscriptions.index');
    Route::get('/create', [SubscriptionController::class, 'create'])->name('admin.subscriptions.create');
    Route::post('/', [SubscriptionController::class, 'store'])->name('admin.subscriptions.store');
    Route::get('/{id}', [SubscriptionController::class, 'show'])->name('admin.subscriptions.show');
    Route::get('/{id}/edit', [SubscriptionController::class, 'edit'])->name('admin.subscriptions.edit');
    Route::put('/{id}', [SubscriptionController::class, 'update'])->name('admin.subscriptions.update');
    Route::delete('/{id}', [SubscriptionController::class, 'destroy'])->name('admin.subscriptions.destroy');
});
    
    Route::prefix('highlights')->group(function () {
        Route::get('/', [HighlightsController::class, 'index'])->name('admin.highlights.index');
        Route::get('/create', [HighlightsController::class, 'create'])->name('admin.highlights.create');
        Route::post('/', [HighlightsController::class, 'store'])->name('admin.highlights.store');
        Route::get('/{id}', [HighlightsController::class, 'show'])->name('admin.highlights.show');
        Route::get('/{id}/edit', [HighlightsController::class, 'edit'])->name('admin.highlights.edit');
        Route::put('/{id}', [HighlightsController::class, 'update'])->name('admin.highlights.update');
        Route::delete('/{id}', [HighlightsController::class, 'destroy'])->name('admin.highlights.destroy');
    });
    
    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('admin.users.create');
        Route::post('/', [UsersController::class, 'store'])->name('admin.users.store');
        Route::get('/{id}', [UsersController::class, 'show'])->name('admin.users.show');
        Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{id}', [UsersController::class, 'update'])->name('admin.users.update');
        Route::delete('/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
    });



    Route::prefix('sports')->group(function () {
        Route::get('/', [SportsController::class, 'index'])->name('admin.sports.index');
        Route::get('/create', [SportsController::class, 'create'])->name('admin.sports.create');
        Route::post('/', [SportsController::class, 'store'])->name('admin.sports.store');
        Route::get('/{id}', [SportsController::class, 'show'])->name('admin.sports.show');
        Route::get('/{id}/edit', [SportsController::class, 'edit'])->name('admin.sports.edit');
        Route::put('/{id}', [SportsController::class, 'update'])->name('admin.sports.update');
        Route::delete('/{id}', [SportsController::class, 'destroy'])->name('admin.sports.destroy');
    });
    
   

  
    Route::prefix('lives')->group(function () {
        Route::get('/', [LiveBroadcastController::class, 'index'])->name('admin.lives.index');
        Route::get('/create', [LiveBroadcastController::class, 'create'])->name('admin.lives.create');
        Route::post('/', [LiveBroadcastController::class, 'store'])->name('admin.lives.store');
        Route::get('/{id}', [LiveBroadcastController::class, 'show'])->name('admin.lives.show');
        Route::get('/{id}/edit', [LiveBroadcastController::class, 'edit'])->name('admin.lives.edit');
        Route::put('/{id}', [LiveBroadcastController::class, 'update'])->name('admin.lives.update');
        Route::delete('/{id}', [LiveBroadcastController::class, 'destroy'])->name('admin.lives.destroy');
    });


});



