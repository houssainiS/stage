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
Route::get('/DAF/{daf}/request',[DafController::class,'request'])->name('DAFrequest');
Route::get('/DAF/{daf}/request/order/IT',[DafController::class,'ITrequestOrder'])->name('DAFITrequest.order');
Route::get('/DAF/{daf}/request/order/Stationary',[DafController::class,'STrequestOrder'])->name('DAFSTrequest.order');
Route::post('/DAF/{daf}/request/order/IT/store',[DafController::class,'ITrequestStore'])->name(name: 'DAFITrequestStore.store');
Route::post('/DAF/{daf}/request/order/ST/store',[DafController::class,'STrequestStore'])->name(name: 'DAFSTrequestStore.store');
Route::get('/DAF/{daf}/IThistory',[DafController::class,'IThistory'])->name('DAFIThistory');
Route::get('/DAF/{daf}/SThistory',[DafController::class,'SThistory'])->name('DAFSThistory');
Route::get('/DAF/{daf}/history',[DafController::class,'history'])->name('DAFHistory');
Route::get('/DAF/{daf}/history/{request}',[DafController::class,'DAFoneHistory'])->name('DAFoneHistory.history');
Route::get('DAF/{daf}/work',[DafController::class,'work'])->name('DAFwork');
Route::get('DAF/{daf}/work/approve',[DafController::class,'approve'])->name('DAFwork.approve');
Route::get('DAF/{daf}/work/approve/PR/done',[DafController::class,'approved'])->name('DAFwork.approved');
Route::get('DAF/{daf}/work/approve/PR/{reference}',[DafController::class,'approvePR'])->name('DAFwork.approvePR');
Route::get('DAF/{daf}/work/disapprove/PR/{reference}',[DafController::class,'disapprovePR'])->name('DAFwork.disapprovePR');
Route::get('DAF/{daf}/work/PR/{PR_id}',[DafController::class,'onePr'])->name('DAFwork.onePr');

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
Route::get('/AMLC/{amlc}/work/PR-sent',[AmlcController::class,'requestsPrSent'])->name('AMLCwork.requestsPrSent');
Route::get('/AMLC/{amlc}/work/PR',[AmlcController::class,'PRform'])->name('AMLCwork.PRform');
Route::post('/AMLC/{amlc}/work/PR/store',[AmlcController::class,'PRformStore'])->name('AMLCwork.PRformStore');
Route::get('/AMLC/{amlc}/work/PR/{PR_id}',[AmlcController::class,'onePr'])->name('AMLCwork.onePr');
Route::get('/AMLC/{amlc}/work/PR-sent/approved',[AmlcController::class,'approvedPR'])->name('AMLCwork.approvedPR');
Route::get('/AMLC/{amlc}/work/PR-sent/approved/Quotation',[AmlcController::class,'sendQ'])->name('AMLCwork.sendQ');
Route::put('/AMLC/{amlc}/work/PR-sent/approved/Quotation/store/{PR_id}',[AmlcController::class,'sendQstore'])->name('AMLCwork.sendQstore');
Route::get('/AMLC/{amlc}/work/PR-sent/approved/Quotation/approved',[AmlcController::class,'approvedQ'])->name('AMLCwork.approvedQ');
Route::get('/AMLC/{amlc}/work/PR-sent/approved/Quotation/justapproved',[AmlcController::class,'Qapproved'])->name('AMLCwork.Qapproved');
Route::get('/AMLC/{amlc}/work/STrequests/approved-BY-amlc/',[AmlcController::class,'AMLCSTapproved'])->name('AMLCwork.AMLCSTapproved');
Route::get('/AMLC/{amlc}/work/STrequests/approved-BY-amlc/confirm-purchase',[AmlcController::class,'AMLCSTconfirm'])->name('AMLCwork.AMLCSTconfirm');
Route::get('/AMLC/{amlc}/work/STrequests/approved-BY-amlc/confirm-purchase/bought/{reference}',[AmlcController::class,'AMLCSTbought'])->name('AMLCwork.AMLCSTbought');
Route::get('/AMLC/{amlc}/work/STrequests/approved-BY-amlc/confirmed-purchase',[AmlcController::class,'AMLCSTconfirmed'])->name('AMLCwork.AMLCSTconfirmed');
Route::get('/AMLC/{amlc}/work/ITrequests',[AmlcController::class,'ITrequestsToApprove'])->name('AMLCwork.ITrequests');
Route::get('/AMLC/{amlc}/work/ITrequests/approve/{reference}',[AmlcController::class,'AMLCITapprove'])->name('AMLCwork.ITapprove');
Route::get('/AMLC/{amlc}/work/ITrequests/disapprove/{reference}',[AmlcController::class,'AMLCITdisapprove'])->name('AMLCwork.ITdisapprove');
Route::get('/AMLC/{amlc}/work/ITrequests/found/{reference}',[AmlcController::class,'AMLCITfound'])->name('AMLCwork.ITfound');
Route::get('/AMLC/{amlc}/work/IT/found-in-the-stock',[AmlcController::class,'ITrequestsFoundInStock'])->name('AMLCwork.ITrequestsFoundInStock');
Route::get('/AMLC/{amlc}/work/ITrequests/approved-BY-amlc/',[AmlcController::class,'AMLCITapproved'])->name('AMLCwork.AMLCITapproved');
Route::get('/AMLC/{amlc}/work/ITrequests/approved-BY-amlc/confirm-purchase',[AmlcController::class,'AMLCITconfirm'])->name('AMLCwork.AMLCITconfirm');
Route::get('/AMLC/{amlc}/work/ITrequests/approved-BY-amlc/confirm-purchase/bought/{reference}',[AmlcController::class,'AMLCITbought'])->name('AMLCwork.AMLCITbought');
Route::get('/AMLC/{amlc}/work/ITrequests/approved-BY-amlc/confirmed-purchase',[AmlcController::class,'AMLCITconfirmed'])->name('AMLCwork.AMLCITconfirmed');


////////
//BOD
Route::get('/BOD/{bod}/work/approve/PR/Quotation/approved',[BODController::class,'approvedQuotation'])->name('BODwork.approvedQ');
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
Route::get('/BOD/{bod}/work',[BodController::class,'work'])->name('BODwork');
Route::get('/BOD/{bod}/work/PR/approve',[BodController::class,'PRapprove'])->name('BODwork.PRapprove');
Route::get('/BOD/{bod}/work/PR/{PR_id}',[BODController::class,'onePr'])->name('BODwork.onePr');
Route::get('/BOD/{bod}/work/approve/PR/{reference}',[BODController::class,'approvePR'])->name('BODwork.approvePR');
Route::get('/BOD/{bod}/work/disapprove/PR/{reference}',[BODController::class,'disapprovePR'])->name('BODwork.disapprovePR');
Route::get('/BOD/{bod}/work/approved/PR/',[BODController::class,'approved'])->name('BODwork.approvedPR');
Route::get('/BOD/{bod}/work/PR-sent/approved/Quotation/approve',[BODController::class,'approveQ'])->name('BODwork.approveQ');
Route::get('/BOD/{bod}/work/approve/PR/Quotation/{reference}',[BODController::class,'approveQuotation'])->name('BODwork.approveQuotation');
Route::get('/BOD/{bod}/work/approve/PR/Quotation/disapprove/{reference}',[BODController::class,'disapproveQuotation'])->name('BODwork.disapproveQuotation');
