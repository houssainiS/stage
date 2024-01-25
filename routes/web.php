<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DhController;
use App\Http\Controllers\DafController;
use App\Http\Controllers\AmlcController;
use App\Http\Controllers\BodController;
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
Route::get('/DepartmentHead/{DH}/request',[DhController::class,'request'])->name('DHrequest');
Route::get('/DepartmentHead/{DH}/request/order/IT',[DHController::class,'ITrequestOrder'])->name('DHITrequest.order');
Route::get('/DepartmentHead/{DH}/request/order/Stationary',[DHController::class,'STrequestOrder'])->name('DHSTrequest.order');
Route::post('/DepartmentHead/{DH}/request/order/IT/store',[DHController::class,'ITrequestStore'])->name(name: 'DHITrequestStore.store');
Route::post('/DepartmentHead/{DH}/request/order/ST/store',[DHController::class,'STrequestStore'])->name(name: 'DHSTrequestStore.store');
Route::get('/DepartmentHead/{DH}/IThistory',[DHController::class,'IThistory'])->name('DhIThistory');
Route::get('/DepartmentHead/{DH}/SThistory',[DHController::class,'SThistory'])->name('DhSThistory');
Route::get('/DepartmentHead/{DH}/history',[DhController::class,'history'])->name('DhHistory');
Route::get('/DepartmentHead/{DH}/history/{request}',[DhController::class,'requestHistory'])->name('DHrequest.history');
Route::get('/DepartmentHead/{DH}/approvals',[DhController::class,'approvals'])->name('DhApprovals');
Route::get('/DepartmentHead/{DH}/approvals/waiting',[DhController::class,'waiting'])->name('DhWaiting');
Route::get('/DepartmentHead/{DH}/approvals/approved/',[DhController::class,'DHapproved'])->name('DHapproved');
Route::get('/DepartmentHead/{DH}/approvals/approve/{request}',[DhController::class,'DHapprove'])->name('DHapprove');
Route::get('/DepartmentHead/{DH}/approvals/disapprove/{request}',[DhController::class,'DHdisapprove'])->name('DHdisapprove');
Route::get('/DepartmentHead/{DH}/historyall/{request}',[DhController::class,'DHrequestHistory'])->name('DHrequestall.history');
// dh done
//////////
//DAF 
Route::get('/DAF/{daf}',[DafController::class,'goDAF'])->name('goDAF');
Route::get('/DAF/{daf}/aboutme',[DafController::class,'aboutmeDAF'])->name('aboutmeDAF');
//////
//Asset managment and logistic coordinator
Route::get('/AMLC/{amlc}',[AmlcController::class,'goAMLC'])->name('goAMLC');
Route::get('/AMLC/{amlc}/aboutme',[AmlcController::class,'aboutme'])->name('aboutmeAMLC');
Route::get('/AMLC/{amlc}/request',[AmlcController::class,'request'])->name('AMLCrequest');
Route::get('/AMLC/{amlc}/request/order/IT',[AmlcController::class,'ITrequestOrder'])->name('AMLCITrequest.order');
Route::get('/AMLC/{amlc}/request/order/Stationary',[AmlcController::class,'STrequestOrder'])->name('AMLCSTrequest.order');
Route::post('/AMLC/{amlc}/request/order/IT/store',[AmlcController::class,'ITrequestStore'])->name(name: 'AMLCITrequestStore.store');
Route::post('/AMLC/{amlc}/request/order/ST/store',[AmlcController::class,'STrequestStore'])->name(name: 'AMLCSTrequestStore.store');
Route::get('/AMLC/{amlc}/IThistory',[AmlcController::class,'IThistory'])->name('AMLCIThistory');
Route::get('/AMLC/{amlc}/SThistory',[AmlcController::class,'SThistory'])->name('AMLCSThistory');
Route::get('/AMLC/{amlc}/history',[AmlcController::class,'history'])->name('AMLCHistory');
Route::get('/AMLC/{amlc}/history/{request}',[AmlcController::class,'AMLConeHistory'])->name('AMLConeHistory.history');
Route::get('/AMLC/{amlc}/work',[AmlcController::class,'work'])->name('AMLCwork');
Route::get('/AMLC/{amlc}/work/STrequests',[AmlcController::class,'STrequestsToApprove'])->name('AMLCwork.STrequests');
Route::get('/AMLC/{amlc}/work/STrequests/approve/{reference}',[AmlcController::class,'AMLCSTapprove'])->name('AMLCwork.STapprove');
Route::get('/AMLC/{amlc}/work/STrequests/disapprove/{reference}',[AmlcController::class,'AMLCSTdisapprove'])->name('AMLCwork.STdisapprove');
Route::get('/AMLC/{amlc}/work/STrequests/found/{reference}',[AmlcController::class,'AMLCSTfound'])->name('AMLCwork.STfound');
Route::get('/AMLC/{amlc}/work/requests/check/{reference}',[AmlcController::class,'AMLConeRequest'])->name('AMLCwork.oneRequest');
Route::get('/AMLC/{amlc}/work/found-in-the-stock',[AmlcController::class,'STrequestsFoundInStock'])->name('AMLCwork.STrequestsFoundInStock');

////////
//BOD
Route::get('/BOD/{bod}',[BodController::class,'goBOD'])->name('goBOD');
Route::get('/BOD/{bod}/aboutme',[BodController::class,'aboutme'])->name('aboutmeBOD');
Route::get('/BOD/{bod}/request',[BodController::class,'request'])->name('BODrequest');
Route::get('/BOD/{bod}/request/order/IT',[BodController::class,'ITrequestOrder'])->name('BODITrequest.order');
Route::get('/BOD/{bod}/request/order/Stationary',[BodController::class,'STrequestOrder'])->name('BODSTrequest.order');
Route::post('/BOD/{bod}/request/order/IT/store',[BodController::class,'ITrequestStore'])->name(name: 'BODITrequestStore.store');
Route::post('/BOD/{bod}/request/order/ST/store',[BodController::class,'STrequestStore'])->name(name: 'BODSTrequestStore.store');
Route::get('/BOD/{bod}/IThistory',[BodController::class,'IThistory'])->name('BODIThistory');
Route::get('/BOD/{bod}/SThistory',[BodController::class,'SThistory'])->name('BODSThistory');
Route::get('/BOD/{bod}/history',[BodController::class,'history'])->name('BODHistory');
Route::get('/BOD/{bod}/history/{request}',[BODController::class,'BODoneHistory'])->name('BODoneHistory.history');
