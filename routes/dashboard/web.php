<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::prefix('dashboard/')->name('dashboard.')->group(function (){

        Route::get('index',[DashboardController::class ,'index'])->name('index');

        //user route
        Route::resource('users','UserController');


    });
    });

