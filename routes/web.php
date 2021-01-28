<?php


Auth::routes();


Route::group(['namespace' => 'Shop', ], function(){
    Route::get('/', 'ShopController@show');
    Route::get('/about', 'ShopController@about');
    Route::get('/contact', 'ShopController@contact');
    Route::get('/product', 'ShopController@product');
    Route::get('/single', 'ShopController@single');
});

Route::group(['prefix' => '/admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::resource('/slider', 'SliderController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/product', 'ProductController');
});
Route::group(['prefix' => '/user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function(){
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
});