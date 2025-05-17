<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NurseryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Nursery
Route::get('/', 'App\Http\Controllers\NurseryController@index')->name('List_Nursery');
Route::get('/garderies', 'App\Http\Controllers\NurseryController@index')->name('List_Nursery');
Route::get('/garderies/{id}/edit', 'App\Http\Controllers\NurseryController@formModifyNursery')->name('Form_Modify_Nursery');
Route::post('/garderies/add', 'App\Http\Controllers\NurseryController@add')->name('Add_Nursery');
Route::put('/garderies/{id}/update', 'App\Http\Controllers\NurseryController@update')->name('Modify_Nursery');
Route::delete('/garderies/{id}/delete', 'App\Http\Controllers\NurseryController@delete')->name('Delete_Nursery');
Route::delete('/garderies/clear', 'App\Http\Controllers\NurseryController@clear')->name('Clear_List_Nursery');
//commerce
Route::get('/commerce', 'App\Http\Controllers\CommerceController@index')->name('List_Commerce');
Route::get('/commerce/{id}/edit', 'App\Http\Controllers\CommerceController@formModifyCommerce')->name('Form_Modify_Commerce');
Route::post('/commerce/add', 'App\Http\Controllers\CommerceController@add')->name('Add_Commerce');
Route::put('/commerce/{id}/update', 'App\Http\Controllers\CommerceController@update')->name('Modify_Commerce');
Route::delete('/commerce/{id}/delete', 'App\Http\Controllers\CommerceController@delete')->name('Delete_Commerce');
Route::delete('/commerce/clear', 'App\Http\Controllers\CommerceController@clear')->name('Clear_List_Commerce');

//Expense
Route::get('/depense', 'App\Http\Controllers\ExpenseController@index')->name('List_Expense');
Route::get('/depense/{id}/edit', 'App\Http\Controllers\ExpenseController@formModifyExpense')->name('Form_Modify_Expense');
Route::post('/depense/add', 'App\Http\Controllers\ExpenseController@add')->name('Add_Expense');
Route::put('/depense/{id}/update', 'App\Http\Controllers\ExpenseController@update')->name('Modify_Expense');
Route::delete('/depense/{id}/delete', 'App\Http\Controllers\ExpenseController@delete')->name('Delete_Expense');
Route::delete('/depense/clear', 'App\Http\Controllers\ExpenseController@clear')->name('Clear_List_Expense');
//categoryExpense
Route::get('/CategoryExpense', 'App\Http\Controllers\CategoryExpenseController@index')->name('List_CategoryExpense');
Route::get('/categoryExpense/{id}/edit', 'App\Http\Controllers\CategoryExpenseController@formModifyCategoryExpense')->name('Form_Modify_CategoryExpense');
Route::post('/CategoryExpense/add', 'App\Http\Controllers\CategoryExpenseController@add')->name('Add_CategoryExpense');
Route::put('/categoryExpense/{id}/update', 'App\Http\Controllers\CategoryExpenseController@update')->name('Modify_CategoryExpense');
Route::delete('/CategoryExpense/{id}/delete', 'App\Http\Controllers\CategoryExpenseController@delete')->name('Delete_CategoryExpense');
Route::delete('/CategoryExpense/clear', 'App\Http\Controllers\CategoryExpenseController@clear')->name('Clear_List_CategoryExpense');


//teacher
Route::get('/teacher', 'App\Http\Controllers\TeacherController@index')->name('List_Teacher');
Route::get('/teacher/{id}/edit', 'App\Http\Controllers\TeacherController@formModifyTeacher')->name('Form_Modify_Teacher');
Route::post('/teacher/add', 'App\Http\Controllers\TeacherController@add')->name('Add_Teacher');
Route::put('/teacher/{id}/update', 'App\Http\Controllers\TeacherController@update')->name('Modify_Teacher');
Route::delete('/teacher/{id}/delete', 'App\Http\Controllers\TeacherController@delete')->name('Delete_Teacher');
Route::delete('/teacher/clear', 'App\Http\Controllers\TeacherController@clear')->name('Clear_List_Teacher');

//kids
Route::get('/kid', 'App\Http\Controllers\KidController@index')->name('List_Kid');
Route::get('/kid/{id}/edit', 'App\Http\Controllers\KidController@formModifyKid')->name('Form_Modify_Kid');
Route::post('/kid/add', 'App\Http\Controllers\KidController@add')->name('Add_Kid');
Route::put('/kid/{id}/update', 'App\Http\Controllers\KidController@update')->name('Modify_Kid');
Route::delete('/kid/{id}/delete', 'App\Http\Controllers\KidController@delete')->name('Delete_Kid');
Route::delete('/kid/clear', 'App\Http\Controllers\KidController@clear')->name('Clear_List_Kid');

//presences
Route::get('/presence', 'App\Http\Controllers\PresenceController@index')->name('List_Presence');
Route::post('/presence/add', 'App\Http\Controllers\PresenceController@add')->name('Add_Presence');
Route::delete('/presence/{id}/delete', 'App\Http\Controllers\PresenceController@delete')->name('Delete_Presence');
Route::delete('/presence/clear', 'App\Http\Controllers\PresenceController@clear')->name('Clear_List_Presence');

//state
Route::get('/state', 'App\Http\Controllers\StateController@index')->name('List_State');
Route::post('/state/add', 'App\Http\Controllers\StateController@add')->name('Add_State');
Route::delete('/state/{id}/delete', 'App\Http\Controllers\StateController@delete')->name('Delete_State');

//rapport
Route::get('/rapport', 'App\Http\Controllers\RapportController@index')->name('Show_Rapport');
