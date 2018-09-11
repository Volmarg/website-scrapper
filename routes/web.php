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

Route::get('/', 'InputForms@setFormsAttributes')->name('index');

#Route::post('/','curl@getContet')->name('curler');

Route::post('/fetch-form', 'FormInput\FormFetch@getInput')->name('formFetcher');


#Testing routes - remove them later
Route::get('/testing', function () {

return view('test');
})->name('tests');