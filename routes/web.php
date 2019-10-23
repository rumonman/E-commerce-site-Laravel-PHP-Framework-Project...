<?php

//Frontend

Route::get('/','FrontendController@index');
Route::get('/product/details/{id}','FrontendController@productdetails');
Route::get('/product/future/details/{id}','FrontendController@productfuturedetails');
Route::get('/category/wise/product/{category_id}','FrontendController@categorywiseproduct');
Route::get('/contuct','FrontendController@contuct');
Route::post('/contuct/insert', 'FrontendController@contuctinsert');
Route::get('add/product/to/card/{id}', 'FrontendController@addproducttocard');
Route::get('add/card/details', 'FrontendController@addcarddetails');
Route::get('/delete/card/product/{id}', 'FrontendController@deletecardproduct');
Route::get('clear/card', 'FrontendController@clearcard');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'HomeController@index');
Route::get('/user/delete/{id}', 'HomeController@userdelete');
Route::get('/user/delete/rtestor/{id}', 'HomeController@userrestore');
Route::get('/user/edit/{id}', 'HomeController@useredit');
Route::post('/user/edit/update/{id}', 'HomeController@usereditupdate');
Route::get('/user/force/delete/{id}', 'HomeController@userforcedelete');
Route::get('/add/product', 'ProductController@addproduct');
Route::post('/add/product/insert', 'ProductController@addproductinsert');
Route::get('/add/product/edit/{id}', 'ProductController@addproductedit');
Route::post('/add/product/update/{id}', 'ProductController@addproductupdate');
Route::get('/product/soft/delete/{id}', 'ProductController@productsoftdelete');
Route::get('/product/soft/restore/{id}', 'ProductController@productrestore');
Route::get('/product/permanent/delete/{id}', 'ProductController@productpermanentdelete');


//future Product Backend
Route::get('/add/future/product', 'FutureController@addfutureproduct');
Route::post('/add/future/product/insert', 'FutureController@addfutureproductinsert');
Route::get('/add/future/product/edit/{id}', 'FutureController@addfutureproductedit');
Route::post('/add/future/product/update/{id}', 'FutureController@addfutureproductupdate');
Route::get('/add/future/product/delete/{id}', 'FutureController@addfutureproductdelete');
Route::get('/add/future/product/restore/{id}', 'FutureController@addfutureproductrestore');
Route::get('/future/product/force/delete/{id}','FutureController@futureproductforce');


Route::get('/add/product/categorie','CategorieController@addproductcategorie');
Route::post('/add/product/categorie/insert','CategorieController@productcategorieinsert');
Route::get('/contuct/massage/view','HomeController@contuctmassageview');
Route::get('/change/button/status/{id}','HomeController@changebuttonstatus');
Route::get('/contuct/message/delete/{id}','HomeController@contuctmessagedelete');


