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

Route::get('/', ['as' => 'dashboard', 'middleware' =>'auth', 'uses' => 'IssueController@issue']);
Route::post('/issue', ['as' => 'stock.issue.post', 'middleware' =>'auth', 'uses' => 'IssueController@issueItem']);
Route::get('/issue-reports', ['as' => 'stock.issue.report', 'middleware' =>'auth', 'uses' => 'IssueController@issueReport']);

Route::get('/items', ['as' => 'items.report', 'middleware' =>'auth', 'uses' => 'ItemsController@index']);

Route::get('/import-items', ['as' => 'upload.excel.items', 'uses' => 'ItemsController@uploadExcel']);
Route::post('/import-items', ['as' => 'process.excel.items', 'uses' => 'ItemsController@processExcelItems']);


Route::get('/receive', ['as' => 'stock.receive', 'middleware' =>'auth', 'uses' => 'ReceiveController@receive']);
Route::post('/receive', ['as' => 'stock.receive.post', 'middleware' =>'auth', 'uses' => 'ReceiveController@receiveItem']);
Route::get('/receive-reports', ['as' => 'stock.receive.report', 'middleware' =>'auth', 'uses' => 'ReceiveController@receiveItemReport']);


Route::get('/upload-excel', ['as' => 'upload.excel', 'uses' => 'ExcelController@upload']);
Route::post('/process-excel', ['as' => 'process.excel', 'uses' => 'ExcelController@process']);



Route::get('/upload-excel', ['as' => 'upload.excel', 'uses' => 'ExcelController@upload']);
Route::post('/process-excel', ['as' => 'process.excel', 'uses' => 'ExcelController@process']);

Route::get('/upload-excel-report', ['as' => 'upload.excel.report', 'uses' => 'ExcelController@uploadExcelReport']);
Route::post('/process-excel-report', ['as' => 'process.excel.report', 'uses' => 'ExcelController@processExcelReport']);


Route::get('/upload-package-excel', ['as' => 'upload.package.excel', 'uses' => 'ExcelController@createPackageList']);
Route::post('/process-package-excel', ['as' => 'process.package.excel', 'uses' => 'ExcelController@savePackageList']);

Route::get('/package-list', ['as' => 'package_list', 'uses' => 'PackagesController@index']);


Route::get('/upload-match-package', [ 'uses' => 'PackagesController@uploadMatchMaker']);
Route::post('/process-package-matching', ['as' => 'process_match_making', 'uses' => 'PackagesController@matchMake']);


Auth::routes();

Route::get('/home', 'IssueController@issue')->name('home');
