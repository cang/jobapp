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

/* Route::get('/', function () {
    return view('welcome');
});
*/

Route::view('jobs', 'jobs');
Route::get('jobs/detail/{id}', 'JobController@detail');
Route::get('/', 'HomeController@home')->name('home');
Route::get('/admin', 'HomeController@admin');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::resource('/admin/company', 'CompanyController');
Route::resource('/admin/job', 'JobController');
Route::get('/admin/job/create/{companyid?}', 'JobController@create');

//Route::resource('/admin/jobcategory', 'JobCategoryController');

