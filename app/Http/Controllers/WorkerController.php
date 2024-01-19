<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Itrequest;
use App\Models\Strequest;
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

$rn= Worker::find($workerid);
$old_requests_number =$rn->requests_number;
$updated_requests_number=$old_requests_number+1;
$rn->update(['requests_number'=>$updated_requests_number]);

return redirect()->route('request',['worker'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
    }

    public function STrequestStore($workerid){
        $user=Worker::where('id',$workerid)->first();
        $strequest = new StRequest();
        $strequest->requestor_id = $workerid;
        $strequest->reference = $user->requests_number;
        $strequest->description1 = request('description1');
        $strequest->description2 = request('description2');
        $strequest->description3 =request('description3');
        $strequest->description4 = request('description4');
        $strequest->quantity1 = request('quantity1');
        $strequest->quantity2 = request('quantity2');
        $strequest->quantity3 = request('quantity3');
        $strequest->quantity4 = request('quantity4');
        $strequest->remarks1 = request('remarks1');
        $strequest->remarks2 = request('remarks2');
        $strequest->remarks3 = request('remarks3');
        $strequest->remarks4 = request('remarks4');
        $strequest->signature =request('signature');
        $strequest->DH_approval = request('DH_approval') ?? false;
        $strequest->DH_approval_date = request('DH_approval_date');
        $strequest->AMLC_approval = request('AMLC_approval') ?? false;
        $strequest->AMLC_approval_date = request('AMLC_approval_date');
        $strequest->BOD1_approval = request('BOD1_approval') ?? false;
        $strequest->BOD1_approval_date = request('BOD1_approval_date');
        $strequest->AMLC2_approval = request('AMLC2_approval') ?? false;
        $strequest->AMLC2_approval_date = request('AMLC2_approval_date');
        $strequest->AMLC_found = request('AMLC_found') ?? false;
        $strequest->AMLC_found_date = request('AMLC_found_date');
        $strequest->price = request('price');
        $strequest->BOD2_approval = request('BOD2_approval') ?? false;
        $strequest->BOD2_approval_date = request('BOD2_approval_date');
        $strequest->AMLC_bought = request('AMLC_bought') ?? false;
        $strequest->AMLC_bought_date = request('AMLC_bought_date');

$strequest->save();
$rn= Worker::find($workerid);
$old_requests_number =$rn->requests_number;
$updated_requests_number=$old_requests_number+1;
$rn->update(['requests_number'=>$updated_requests_number]);
return redirect()->route('request',['worker'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
    }

public function history($worker){
    $data1=Itrequest::where('requestor_id',$worker)->get();
    $data2=Strequest::where('requestor_id',$worker)->get();
    $mergedData = $data1->concat($data2);
    $sortedData = $mergedData->sortBy('reference');
//dd($mergedData);
    return view ('workersPage.workerHistory',['worker'=>$worker,'data'=>$mergedData]);
}




}
