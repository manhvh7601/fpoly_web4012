<?php

use App\Http\Controllers\WebsiteLayout\CartController;
use App\Http\Controllers\WebsiteLayout\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');

//cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-cart/{id}', [CartController::class, 'addCart'])->name('addCart');
Route::get('/remove-cart/{id}', [CartController::class, 'removeCart'])->name('removeCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/payment', [CartController::class, 'payment'])->name('payment');
Route::get('/payment', [CartController::class, 'paymentComplete'])->name('paymentComplete');

Route::group([
    'middleware' => ['check_login'],
], function () {
    //user
    Route::group([
        //config
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']
    ], function () {
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
        ], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('create', 'UserController@create')->name('create-user');
            Route::get('show/{user}', 'UserController@show')->name('show');
            Route::post('store', 'UserController@store')->name('store');
            Route::get('edit/{user}', 'UserController@edit')->name('edit');
            Route::post('edit/{user}', 'UserController@update')->name('update');
            Route::post('delete/{user}', 'UserController@delete')->name('delete');
        });
    });
    //end user
    //cate
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']

    ], function () {
        Route::group([
            'prefix' => 'categories',
            'as' => 'categories.'
        ], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('create', 'CategoryController@create')->name('add');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
            Route::post('edit/{id}', 'CategoryController@update')->name('update');
            Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
        });
    });
    //end cate
    //product
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']
    ], function () {
        Route::group([
            'prefix' => "products",
            'as' => "products."
        ], function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('create', 'ProductController@create')->name('add');
            Route::post('store', 'ProductController@store')->name('store');
            Route::get('edit/{id}', 'ProductController@edit')->name('edit');
            Route::post('edit/{id}', 'ProductController@update')->name('update');
            Route::post('delete/{id}', 'ProductController@delete')->name('delete');
        });
    });
    //end product
    //invoice
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        'middleware' => ['check_admin']

    ], function () {
        Route::group([
            'prefix' => "invoices",
            'as' => "invoices."
        ], function () {
            Route::get('/', 'InvoiceController@index')->name('index');
            Route::get('show/{id}', 'InvoiceController@show')->name('show');
            Route::post('delete/{id}', 'InvoiceController@delete')->name('delete');
        });
    });
    //end invoice
});


Route::get('login', 'Auth\LoginController@getLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::get('register', 'Auth\RegisterController@getRegisterForm')->name('auth.getRegisterForm');
Route::post('register', 'Auth\RegisterController@postRegisterForm')->name('auth.register');
