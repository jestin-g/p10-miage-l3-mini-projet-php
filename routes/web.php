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

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function()
{
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::name('')->middleware('can:manage-students')->group(function()
{
    Route::resource('/students', 'StudentsController', ['except' => ['create', 'show']]);

    Route::post('students/init', 'StudentsController@init')->name('students.init');

    Route::post('students/dossier/init', 'DossierController@init')->name('dossiers.init');
    Route::post('students/dossier/file/upload', 'DossierController@uploadFile')->name('dossiers.uploadFile');
    Route::post('students/dossier/file/delete', 'DossierController@deleteFile')->name('dossiers.deleteFile');

    Route::resource('/candidacy', 'CandidacyController', ['only' => ['store']]);
});

Route::name('')->middleware('can:manage-teachers')->group(function()
{
    Route::resource('/teacher', 'TeacherController', ['except' => ['create', 'show']]);
    Route::get('/teacher/candidacy/{id}', 'TeacherController@showCandidacy')->name('candidacy.show');
    Route::get('/teacher/candidacy/{id}/update', 'TeacherController@updateCandidacy')->name('candidacy.update');
    Route::get('/teacher/candidacy/{id}/download', 'TeacherController@downloadZippedFolder')->name('candidacy.dossier.download');

});