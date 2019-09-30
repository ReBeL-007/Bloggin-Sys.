<?php

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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Admin Routes

Route::group(['namespace'=>'Admin'], function(){

    //admin auth
    
      // Authentication Routes...
      Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
      Route::post('admin-login', 'Auth\LoginController@login');
      Route::get('admin-logout', 'Auth\LoginController@logout')->name('admin.logout');

      // Registration Routes...
    //   Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //   Route::post('register', 'Auth\RegisterController@register');

      // Password Reset Routes...
    //   Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    //   Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    //   Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    //   Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    
    //Page Routes
    Route::get('/admin','PagesController@index');

    //Post Routes
    Route::resource('/admin/post','PostsController');
    
    //Tag Routes
    Route::resource('/admin/tag','TagsController');
    
    //Category Routes
    Route::resource('/admin/category','CategoriesController');

    //User Routes
    Route::resource('/admin/user','UsersController');
    
    //Role Routes
    Route::resource('/admin/role','RolesController');

     //Permission Routes
     Route::resource('/admin/permission','PermissionController');

});


//User Routes

Route::group(['namespace'=>'User'], function(){
    
    //Page Routes
    Route::get('/','PagesController@index');
    
    Route::get('/tag/{tag}','PagesController@tag');

    Route::get('/category/{category}','PagesController@category');

    //Post Routes
    Route::get('/post/{post}','PostsController@show');

    //Vue Routes
    Route::post('getBlogs','PostsController@getBlogs');

    
    //Tag Routes
    // Route::resource('/user/tag','TagsController');
    
    //Category Routes
    // Route::resource('/user/category','CategoriesController');

});





