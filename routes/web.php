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
    return view('welcome');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::get('/admin', 'HomeController@trangadmin')->name('admin');

//dssv
Route::get('/dssv/{id}' ,[
	'as' => 'dssv',
	'uses' => 'HomeController@trangdssv'
]);

Route::post('/addsinhvien', [
	'as' =>	'addsinhvien',
	'uses'=>'HomeController@addsinhvien'
]);
Route::delete('delete-sinhvien/{id}', [
	'as' =>	'delete-sinhvien',
	'uses'=>'HomeController@deletesinhvien'
]);

Route::put('update-sinhvien/{id}', [
	'as' =>	'update-sinhvien',
	'uses'=>'HomeController@updatesinhvien'
]);

//dsp
Route::get('/dslop' ,[
	'as' => 'dslop',
	'uses' => 'HomeController@trangdslop'
]);

Route::post('/addlop', [
	'as' =>	'addlop',
	'uses'=>'HomeController@addlop'
]);
Route::delete('/delete-lop/{id}', [
	'as' =>	'delete-lop',
	'uses'=>'HomeController@deletelop'
]);

Route::put('/update-lop/{id}', [
	'as' =>	'updatelop',
	'uses'=>'HomeController@updatelop'
]);

//dsgv

Route::get('/dsgv' ,[
	'as' => 'dsgv',
	'uses' => 'HomeController@trangdsgv'
]);

Route::post('/addgv', [
	'as' =>	'addgv',
	'uses'=>'HomeController@addgv'
]);
Route::delete('/delete-gv/{id}', [
	'as' =>	'delete-gv',
	'uses'=>'HomeController@deletegv'
]);

Route::put('/update-gv/{id}', [
	'as' =>	'updategv',
	'uses'=>'HomeController@updategv'
]);

//monhoc

Route::get('/monhoc' ,[
	'as' => 'monhoc',
	'uses' => 'HomeController@trangmonhoc'
]);

Route::post('/addmonhoc', [
	'as' =>	'addmonhoc',
	'uses'=>'HomeController@addmonhoc'
]);
Route::delete('/delete-monhoc/{id}', [
	'as' =>	'delete-monhoc',
	'uses'=>'HomeController@deletemonhoc'
]);

Route::put('/update-monhoc/{id}', [
	'as' =>	'updatemonhoc',
	'uses'=>'HomeController@updatemonhoc'
]);

//thoikhoabieu

Route::get('/thoikhoabieu' ,[
	'as' => 'thoikhoabieu',
	'uses' => 'HomeController@trangthoikhoabieu'
]);

Route::get('/chitietthoikhoabieu/{id}' ,[
	'as' => 'chitietthoikhoabieu',
	'uses' => 'HomeController@chitietthoikhoabieu'
]);

Route::post('/addthoikhoabieu', [
	'as' =>	'addthoikhoabieu',
	'uses'=>'HomeController@addthoikhoabieu'
]);

Route::delete('delete-thoikhoabieu/{id}', [
	'as' =>	'delete-thoikhoabieu',
	'uses'=>'HomeController@deletethoikhoabieu'
]);

Route::put('update-thoikhoabieu/{id}', [
	'as' =>	'update-thoikhoabieu',
	'uses'=>'HomeController@updatethoikhoabieu'
]);

///DIEM DANH

Route::get('/diemdanh' ,[
	'as' => 'diemdanh',
	'uses' => 'HomeController@trangdiemdanh'
]);

Route::get('/chitietdiemdanh/{name}' ,[
	'as' => 'chitietdiemdanh',
	'uses' => 'HomeController@chitietdiemdanh'
]);

