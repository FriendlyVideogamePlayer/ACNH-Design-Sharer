<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/designs');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/uploadhelp', function () {
    return view('uploadhelp');
});

Route::any('/search', 'DesignsController@searchDesigns');

Route::resource('designs', 'DesignsController');

Route::get('/unapproveddesigns', 'DesignsController@showUnapprovedDesigns');

Route::get('/approvedesigns', 'DesignsController@approveDesigns');

Route::post('/approvedesigns', 'DesignsController@uploadDesigns')->name('upload.designs');

Route::post('/disapprovedesigns', 'DesignsController@removeDesigns')->name('disapprove.designs');