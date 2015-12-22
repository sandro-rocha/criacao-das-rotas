<?php

Route::get('category/{category}', function(\CodeCommerce\Category $category){

	dd($category);

});


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin'], function(){

	Route::get('products', function(){
		return "Products";
	});
});

Route::pattern('id', '[0-9]+');

Route::get('user/{id?}' , function($id = 123) {

	if($id)
	    return "Olá $id";

	return "Não possui ID";

});

Route::get('exemplo', 'WelcomeController@exemplo');
Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'categories'], function(){
        Route::get('', ['as' => 'admin.categories.index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('show/{id?}', ['as' => 'admin.categories.show', 'uses' => 'AdminCategoriesController@index']);
    });
    Route::group(['prefix' => 'products'], function(){
        Route::get('', ['as' => 'admin.products.index', 'uses' => 'AdminProductsController@index']);
        Route::get('show/{id?}', ['as' => 'admin.products.show', 'uses' => 'AdminProductsController@index']);
    });
});
