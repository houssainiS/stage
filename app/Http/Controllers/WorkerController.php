<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Itrequest;
class WorkerController extends Controller
{
    public function aboutme($worker){
        $user=Worker::where('id',$worker)->first();
        $username=$user->username;
        $name=$user->name;
        $lastname=$user->last_name;
        $email=$user->email;
        $age=$user->age;
        $cin=$user->cin;
        $phone=$user->phone_number;
        $rank=$user->rank;
        $department=$user->department;
        $requests_number=$user->requests_number;

        return view('workersPage.aboutme',['worker'=>$worker,'username'=>$username,'name'=>$name,'lastname'=>$lastname,'email'=>$email,
        'age'=>$age,'phone'=>$phone,'rank'=>$rank,'department'=>$department,'requests_number'=>$requests_number,'id'=>$cin,]);
    }
    public function goWorker($worker){
        return view('workersPage.workerPage',['worker'=>$worker]);
    
    }
    public function request($worker){
        return view ('workersPage.workerRequest',['worker'=>$worker]);
    }

    public function ITrequestOrder($worker){
        $user=Worker::where('id',$worker)->first();
        $name=$user->name;
        $lastname=$user->last_name;
        $cin=$user->cin;
        $rank=$user->rank;
        $department=$user->department;
        $now=now();
        return view ('workersPage.ITwRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
        'department'=>$department,'date'=>$now]);
    }
    public function STrequestOrder($worker){
        $user=Worker::where('id',$worker)->first();
        $name=$user->name;
        $lastname=$user->last_name;
        $cin=$user->cin;
        $rank=$user->rank;
        $department=$user->department;
        $now=now();
        return view ('workersPage.STwRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank,
        'department'=>$department,'date'=>$now]);
    }



    public function ITrequestStore($workerid){
        $user=Worker::where('id',$workerid)->first();
        $itrequest = new ItRequest();
$itrequest->requestor_id = $workerid;
$itrequest->reference = $user->requests_number;
$itrequest->description1 = request('description1');
$itrequest->description2 = request('description2');
$itrequest->description3 = request('description3');
$itrequest->description4 = request('description4');
$itrequest->quantity1 = request('quantity1');
$itrequest->quantity2 = request('quantity2');
$itrequest->quantity3 = request('quantity3');
$itrequest->quantity4 = request('quantity4');
$itrequest->remarks1 = request('remarks1');
$itrequest->remarks2 = request('remarks2');
$itrequest->remarks3 = request('remarks3');
$itrequest->remarks4 = request('remarks4');
$itrequest->DH_approval = request('DH_approval')?? false; 
$itrequest->DH_approval_date = request('DH_approval_date') ;
$itrequest->BOD1_approval = request('BOD1_approval') ?? false;
$itrequest->BOD1_approval_date = request('BOD1_approval_date');
$itrequest->AMLC_approval = request('AMLC_approval')?? false;
$itrequest->AMLC_approval_date = request('AMLC_approval_date');
$itrequest->AMLC_found = request('AMLC_found') ?? false;
$itrequest->AMLC_found_date = request('AMLC_found_date');
$itrequest->price = request('price');
$itrequest->BOD2_approval = request('BOD2_approval')?? false;
$itrequest->BOD2_approval_date = request('BOD2_approval_date');





$itrequest->signature = request('signature'); 

$itrequest->save();
return redirect()->route('request',['worker'=>$workerid])->with('success', 'Worker registered successfully!')->with('showalert', true);
    }
}
