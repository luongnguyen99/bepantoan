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
    return view('admin.layout.master');
});


Route::get('login', 'Auth\LoginController@showFormLogin')->name('login');
Route::post('saveLogin','Auth\LoginController@saveLogin')->name('saveLogin');
Route::group(['prefix' => 'admin','as' => 'admin.','namespace' => 'Admin','middleware' => 'auth'], function () {
    Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
        ->name('ckfinder_examples');
        
    Route::get('/', function () {
        return view('admin.home.index');
    })->name('home');

    Route::group(['prefix' => 'categories','as' => 'categories.'], function () {
        Route::any('data', 'CategoryController@getData')->name('data');
        Route::get('/','CategoryController@index')->name('index');
        Route::post('saveAdd','CategoryController@saveAdd')->name('saveAdd');
        Route::get('edit/{id}','CategoryController@edit')->name('edit');
        Route::post('saveEdit/{id}','CategoryController@saveEdit')->name('saveEdit');
        Route::post('delete','CategoryController@delete')->name('delete');
        Route::post('deleteMulti','CategoryController@deleteMulti')->name('deleteMulti');
    });

    Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
        Route::any('data', 'BrandController@getData')->name('data');
        Route::get('/', 'BrandController@index')->name('index');
        Route::post('saveAdd', 'BrandController@saveAdd')->name('saveAdd');
        Route::get('edit/{id}', 'BrandController@edit')->name('edit');
        Route::post('saveEdit/{id}', 'BrandController@saveEdit')->name('saveEdit');
        Route::post('delete', 'BrandController@delete')->name('delete');
        Route::post('deleteMulti', 'BrandController@deleteMulti')->name('deleteMulti');
    });

    Route::group(['prefix' => 'properties', 'as' => 'properties.'], function () {
        Route::any('data', 'PropertyController@getData')->name('data');
        Route::get('/', 'PropertyController@index')->name('index');
        Route::post('saveAdd', 'PropertyController@saveAdd')->name('saveAdd');
        Route::get('edit/{id}', 'PropertyController@edit')->name('edit');
        Route::post('saveEdit/{id}', 'PropertyController@saveEdit')->name('saveEdit');
        Route::post('delete', 'PropertyController@delete')->name('delete');
        Route::post('deleteMulti', 'PropertyController@deleteMulti')->name('deleteMulti');

        Route::any('data/{id}', 'PropertyValueController@getData')->name('data_value');
        Route::get('/{id}', 'PropertyValueController@index')->name('index_value');
        Route::post('saveAddValue/{id}', 'PropertyValueController@saveAddValue')->name('saveAddValue');
        Route::post('delete_value', 'PropertyValueController@delete')->name('delete_value');
        Route::post('deleteMulti_value', 'PropertyValueController@deleteMulti')->name('deleteMulti_value');
        Route::get('edit_value/{id}', 'PropertyValueController@edit')->name('edit_value');
        Route::post('saveEdit_value/{id}', 'PropertyValueController@saveEdit')->name('saveEdit_value');
    });


    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::any('data', 'ProductController@getData')->name('data');
        Route::get('/', 'ProductController@index')->name('index');

        Route::get('add', 'ProductController@add')->name('add');
        Route::post('saveAdd', 'PropertyController@saveAdd')->name('saveAdd');
        
        Route::post('delete', 'ProductController@delete')->name('delete');
        Route::post('deleteMulti', 'ProductController@deleteMulti')->name('deleteMulti');
    });
    //=================> Post category <===================
    Route::group(['prefix' => 'post_categories','as' => 'post_categories.'],function(){
        
        Route::get('add', 'Post_categoriesController@getAdd')->name('add');
        Route::post('add', 'Post_categoriesController@postAdd');

        Route::get('edit/{id}', 'Post_categoriesController@getEdit');
        Route::post('edit/{id}', 'Post_categoriesController@postEdit');

        Route::get('del/{id}', 'Post_categoriesController@del');
    });
    //=================> Post  <==========================
    Route::group(['prefix' => 'posts','as' => 'posts.'],function(){
        Route::get('', 'PostsController@getList')->name('index');

        Route::get('add', 'PostsController@getAdd')->name('add');
        Route::post('add', 'PostsController@postAdd');

        Route::get('edit/{id}', 'PostsController@getEdit');
        Route::post('edit/{id}', 'PostsController@postEdit');

        Route::get('del/{id}', 'PostsController@del');
    });
    //=================> Show rooms <===================
    Route::group(['prefix' => 'showroom','as' => 'showroom.'],function(){
        Route::get('', 'ShowroomsController@getList')->name('index');

        Route::get('add', 'ShowroomsController@getAdd')->name('add');
        Route::post('add', 'ShowroomsController@postAdd');

        Route::get('edit/{id}', 'ShowroomsController@getEdit');
        Route::post('edit/{id}', 'ShowroomsController@postEdit');

        Route::get('del/{id}', 'ShowroomsController@del');
    });
    //=================> Options <===================
    Route::group(['prefix' => 'options','as' => 'options.'],function(){

        //=================>Logo<=============================
        Route::get('logo', 'OptionsController@getLogo')->name('logo');
        Route::post('logo', 'OptionsController@postLogo');

        //=================>Hotline<=============================
        Route::get('hotline', 'OptionsController@getHotline')->name('hotline');
        Route::post('hotline', 'OptionsController@postHotline');

        Route::get('del_hotline', 'OptionsController@getDelHotline');

        //=================>Footer<=============================
        Route::get('footer', 'OptionsController@getFooter')->name('footer');
        Route::post('footer', 'OptionsController@postFooter');

        Route::get('del_footer', 'OptionsController@getDelFooter');

        //=================>Payment<=============================
        Route::get('payment', 'OptionsController@getPayment')->name('payment');
        Route::post('payment', 'OptionsController@postPayment');

        Route::get('edit_payment/{id}', 'OptionsController@getEditPayment');
        Route::post('edit_payment/{id}', 'OptionsController@postEditPayment');

        Route::get('del_payment/{id}', 'OptionsController@getDelPayment');
        
        //=================>Social network<=============================
        Route::get('social_network', 'OptionsController@getSocial_network')->name('social_network');
        Route::post('social_network', 'OptionsController@postSocial_network');

        Route::get('edit_social_network/{id}', 'OptionsController@getEditSocial_network');
        Route::post('edit_social_network/{id}', 'OptionsController@postEditSocial_network');

        Route::get('del_social_network/{id}', 'OptionsController@getDelSocial_network');
        
    });
});