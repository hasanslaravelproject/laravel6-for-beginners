<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products','ProductController');
Route::resource('/students','StudentController');
Route::resource('/employees','EmployeeController');
Route::resource('/hellos','HelloController');

Route::get('/employeesdata','HelloController@searchData');
Route::get('/abc','StudentController@searchData');
Route::get('/slidersearch','SliderController@searchData');
Route::get('/changeStatus','SliderController@changeStatus');

Route::resource('/sliders','SliderController');
Route::resource('/skills','SliderController');
Route::resource('/portfolio','SliderController');
Route::resource('/about','SliderController');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/roles','RoleController');
Route::resource('/permissions','PermissionController');
Route::resource('/rolepermissions','RolePermissionController');
Route::resource('/userhasroles','UserhasroleController');
Route::resource('/userhaspermissions','UserhaspermissionController');
Route::get('/addtocarts','CartController@addtocart')->name('addtocarts');
Route::get('/cart','CartController@cartlist');
Route::get('/carts/delete/{id}','CartController@destroy')->name('carts.delete');
Route::get('/updateCart','CartController@updateCart')->name('updateCart');
