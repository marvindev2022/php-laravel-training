<?php

use Illuminate\Support\Facades\Route;

// Rotas para usuários
Route::post('/users', 'UserController@store');
Route::get('/users/{id}', 'UserController@show');
Route::put('/users/{id}', 'UserController@update');
Route::delete('/users/{id}', 'UserController@destroy');

// Rotas para tópicos
Route::post('/topics', 'TopicController@store');
Route::get('/topics/{id}', 'TopicController@show');
Route::put('/topics/{id}', 'TopicController@update');
Route::delete('/topics/{id}', 'TopicController@destroy');
Route::get('/topics', 'TopicController@index');
Route::get('/topics/category/{category}', 'TopicController@getByCategory');

// Rotas para mensagens
Route::post('/messages', 'MessageController@store');
Route::get('/messages/{id}', 'MessageController@show');
Route::put('/messages/{id}', 'MessageController@update');
Route::delete('/messages/{id}', 'MessageController@destroy');
Route::get('/messages/topic/{topic_id}', 'MessageController@getByTopic');
