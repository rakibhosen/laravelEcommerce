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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ..............Frontend custom route.........................
Route::get('/','frontend\pagesController@index')->name('index');
Route::get('/product/new/search','frontend\pagesController@search')->name('search');


// -------------front end ------------
Route::group(['prefix' => '/products'], function(){

    Route::get('/', 'frontend\productController@index')->name('products');
    Route::get('/{slug}', 'frontend\productController@show')->name('products.show');

  });

    // categories...........
    Route::get('/categories/{id}','frontend\categoriesController@showCategory')->name('categories.show');

  // user ..............route
  Route::group(['prefix' => 'user'], function(){
    Route::get('/dashboard', 'frontend\userController@dashboard')->name('user.dashboard');
    Route::get('/profile', 'frontend\userController@profile')->name('user.profile');
    Route::post('/profile/update', 'frontend\userController@profileUpdate')->name('user.profile.update');
});

  //cart
Route::group(['prefix' => 'carts'], function(){
  Route::get('/', 'frontend\CartController@index')->name('carts.index');
  Route::post('/store', 'frontend\CartController@store')->name('carts.store');
  Route::post('/update/{id}', 'frontend\CartController@update')->name('carts.update');
  Route::post('/delete/{id}', 'frontend\CartController@delete')->name('carts.delete');
});


// checkout Routes
Route::group(['prefix' => 'checkout'], function(){
  Route::get('/', 'frontend\checkoutController@index')->name('checkout.index');
  Route::post('/store', 'frontend\checkoutController@store')->name('checkout.store');
  
});



// -------------backend-------------
Route::group(['prefix' => 'admin'], function(){

  Route::get('/', 'backend\pagesController@index')->name('admin.index');

  // admin auth
    // Admin Login Routes
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');
  
    // Password Email Send
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/resetPost', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  
    // Password Reset
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');


//--------------admin product route
  Route::group(['prefix' => '/products'], function(){
  Route::get('/', 'backend\productController@index')->name('admin.product.index');
  Route::get('/create', 'backend\productController@create')->name('admin.product.create');
  Route::post('/store','backend\productController@store')->name('admin.product.store');
  Route::post('/update/{id}','backend\productController@update')->name('admin.product.update');
  Route::post('/delete/{id}','backend\productController@delete')->name('admin.product.delete');
  });


  //--------------admin category route
  Route::group(['prefix' => '/category'], function(){
    Route::get('/', 'backend\categoryController@index')->name('admin.category.index');
    Route::post('/store','backend\categoryController@store')->name('admin.category.store');
    Route::post('/update/{id}','backend\categoryController@update')->name('admin.category.update');
    Route::post('/delete/{id}','backend\categoryController@delete')->name('admin.category.delete');
    });



      //--------------admin brand route
  Route::group(['prefix' => '/brand'], function(){
    Route::get('/', 'backend\brandController@index')->name('admin.brand.index');
    Route::post('/store','backend\brandController@store')->name('admin.brand.store');
    Route::post('/update/{id}','backend\brandController@update')->name('admin.brand.update');
    Route::post('/delete/{id}','backend\brandController@delete')->name('admin.brand.delete');
    });


          //--------------admin division route
  Route::group(['prefix' => '/division'], function(){
    Route::get('/', 'backend\divisionController@index')->name('admin.division.index');
    Route::post('/store','backend\divisionController@store')->name('admin.division.store');
    Route::post('/update/{id}','backend\divisionController@update')->name('admin.division.update');
    Route::post('/delete/{id}','backend\divisionController@delete')->name('admin.division.delete');
    });
  

              //--------------admin district route
  Route::group(['prefix' => '/district'], function(){
    Route::get('/', 'backend\districtController@index')->name('admin.district.index');
    Route::post('/store','backend\districtController@store')->name('admin.district.store');
    Route::post('/update/{id}','backend\districtController@update')->name('admin.district.update');
    Route::post('/delete/{id}','backend\districtController@delete')->name('admin.district.delete');
    });

              //--------------admin slider route
  Route::group(['prefix' => '/slider'], function(){
    Route::get('/', 'backend\sliderController@index')->name('admin.slider.index');
    Route::post('/store','backend\sliderController@store')->name('admin.slider.store');
    Route::post('/update/{id}','backend\sliderController@update')->name('admin.slider.update');
    Route::post('/delete/{id}','backend\sliderController@delete')->name('admin.slider.delete');
    });

    
// order Routes
Route::group(['prefix' => 'order'], function(){
  Route::get('/', 'backend\OrderController@index')->name('admin.order.index');
  Route::get('/show/{id}', 'backend\OrderController@show')->name('admin.order.show');
  Route::post('/delete/{id}', 'backend\OrderController@delete')->name('admin.order.delete');
  Route::get('/completed/{id}', 'backend\OrderController@completed')->name('admin.order.completed');
  Route::get('/paid/{id}', 'backend\OrderController@paid')->name('admin.order.paid');
  Route::get('/charge/{id}', 'backend\OrderController@chargeUpdate')->name('admin.order.charge');
  Route::get('/invoice/{id}', 'backend\OrderController@invoice')->name('admin.order.invoice');
});


});
  










