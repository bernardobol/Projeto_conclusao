<?php

use Illuminate\Support\Facades\Route;

Route::prefix('categorias')->group(function(){
    Route::get("", "categoryController@index")->name("categorias");
    Route::get("novo", "CategoryController@create")->name("categoriasnovo");
    Route::get("{id}", "CategoryController@edit")->name("categoriasform");
    Route::post("", "CategoryController@store")->name("categoriasinsert");
    Route::put("{id}", "CategoryController@update")->name("categoriasupdate");
    Route::delete("{id}", "CategoryController@destroy")->name("categoriasdelete");
});

Route::prefix('postagens')->group(function(){
    Route::get("", "PostController@index")->name("postagens");
    Route::get("novo", "PostController@create")->name("postagensnovo");
    Route::get("{id}", "PostController@edit")->name("postagensform");
    Route::post("", "PostController@store")->name("postagensinsert");
    Route::put("{id}", "PostController@update")->name("postagensupdate");
    Route::delete("{id}", "PostController@destroy")->name("postagensdelete");
});

Route::prefix('usuarios')->middleware('auth')->group(function() {
    Route::get("", "UserController@index")->name("usuarios");
    Route::get("novo", "UserController@create")->name("usuariosnovo");
    Route::get("{id}", "UserController@edit")->name("usuariosform");
    Route::post("", "UserController@store")->name("usuariosinsert");
    Route::put("{id}", "UserController@update")->name("usuariosupdate");
    Route::delete("{id}", "UserController@destroy")->name("usuariosdelete");
});