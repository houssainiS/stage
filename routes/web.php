<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DhController;
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

Route::get('/', [LoginController::class,'welcome'])->name('welcome');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/register',[LoginController::class,'register'])->name(name:'register');
Route::post('/register/store',[LoginController::class,'registerStore'])->name(name: 'register.store');
Route::post('/login/test',[LoginController::class,'loginTest'])->name(name: 'login.test');
Route::get('/test',[LoginController::class,'test'])->name('test');
//worker
Route::get('/worker/{worker}',[LoginController::class,'goWorker'])->name('goWorker');
Route::get('/worker/{worker}/aboutme',[WorkerController::class,'aboutme'])->name('aboutme');
Route::get('/worker/{worker}/request',[WorkerController::class,'request'])->name('request');
Route::get('/worker/{worker}/request/order/IT',[WorkerController::class,'ITrequestOrder'])->name('ITrequest.order');
Route::get('/worker/{worker}/request/order/Stationary',[WorkerController::class,'STrequestOrder'])->name('STrequest.order');
Route::post('/worker/{worker}/request/order/IT/store',[WorkerController::class,'ITrequestStore'])->name(name: 'ITrequestStore.store');
Route::post('/worker/{worker}/request/order/ST/store',[WorkerController::class,'STrequestStore'])->name(name: 'STrequestStore.store');
Route::get('/worker/{worker}/IThistory',[WorkerController::class,'IThistory'])->name('IThistory');
Route::get('/worker/{worker}/SThistory',[WorkerController::class,'SThistory'])->name('SThistory');
Route::get('/worker/{worker}/history',[WorkerController::class,'history'])->name('history');
Route::get('/worker/{worker}/history/{request}',[WorkerController::class,'requestHistory'])->name('request.history');
//department head
Route::get('/DepartmentHead/{DH}',[DhController::class,'goDH'])->name('goDH');
Route::get('/DepartmentHead/{DH}/aboutme',[DhController::class,'aboutmeDH'])->name('aboutmeDH');
Route::get('/DepartmentHead/{DH}/request',[DhController::class,'request'])->name('request');
Route::get('/DepartmentHead/{DH}/request/order/IT',[DHController::class,'ITrequestOrder'])->name('ITrequest.order');

