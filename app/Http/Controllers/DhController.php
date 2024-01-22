<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Itrequest;
use App\Models\Strequest;
class DhController extends Controller
{
    public function goDH($DH){
        return view('DHpage.DhPage',['worker'=>$DH]);
    
    }

    public function aboutmeDH($worker){
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

        return view('DHpage.aboutme',['worker'=>$worker,'username'=>$username,'name'=>$name,'lastname'=>$lastname,'email'=>$email,
        'age'=>$age,'phone'=>$phone,'rank'=>$rank,'department'=>$department,'requests_number'=>$requests_number,'id'=>$cin,]);
    }
    public function request($worker){
        return view ('DHpage.DhRequest',['worker'=>$worker]);
    }
    public function ITrequestOrder($worker){
        $user=Worker::where('id',$worker)->first();
        $name=$user->name;
        $lastname=$user->last_name;
        $cin=$user->cin;
        $rank=$user->rank;
        $department=$user->department;
        $now=now();
        return view ('DHpage.ITdhRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
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
        return view ('DHpage.STdhRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank,
        'department'=>$department,'date'=>$now]);
    }
    public function ITrequestStore($workerid){
        $user=Worker::where('id',$workerid)->first();
        $itrequest = new ItRequest();
$itrequest->requestor_id = $workerid;
$itrequest->reference =$workerid ."-".$user->requests_number;
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
$itrequest->DH_approval = "none"; 
$itrequest->DH_approval_date = request('DH_approval_date') ;
$itrequest->BOD1_approval = "none";
$itrequest->BOD1_approval_date = request('BOD1_approval_date');
$itrequest->AMLC_approval = "none";
$itrequest->AMLC_approval_date = request('AMLC_approval_date');
$itrequest->AMLC_found = "none";
$itrequest->AMLC_found_date = request('AMLC_found_date');
$itrequest->price = request('price');
$itrequest->BOD2_approval = "none";
$itrequest->BOD2_approval_date = request('BOD2_approval_date');
$itrequest->IT_ST="IT";





$itrequest->signature = request('signature'); 

$itrequest->save();

$rn= Worker::find($workerid);
$old_requests_number =$rn->requests_number;
$updated_requests_number=$old_requests_number+1;
$rn->update(['requests_number'=>$updated_requests_number]);
return redirect()->route('DHrequest',['DH'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
    }

    
    public function STrequestStore($workerid){
        $user=Worker::where('id',$workerid)->first();
        $strequest = new StRequest();
        $strequest->requestor_id = $workerid;
        $strequest->reference = $workerid ."-". $user->requests_number;
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
        $strequest->DH_approval = "none";
        $strequest->DH_approval_date = request('DH_approval_date');
        $strequest->AMLC_approval = "none";
        $strequest->AMLC_approval_date = request('AMLC_approval_date');
        $strequest->BOD1_approval = "none";
        $strequest->BOD1_approval_date = request('BOD1_approval_date');
        $strequest->AMLC2_approval = "none";
        $strequest->AMLC2_approval_date = request('AMLC2_approval_date');
        $strequest->AMLC_found = "none";
        $strequest->AMLC_found_date = request('AMLC_found_date');
        $strequest->price = request('price');
        $strequest->BOD2_approval = "none";
        $strequest->BOD2_approval_date = request('BOD2_approval_date');
        $strequest->AMLC_bought = "none";
        $strequest->AMLC_bought_date = request('AMLC_bought_date');
        $strequest->IT_ST="ST";

$strequest->save();
$rn= Worker::find($workerid);
$old_requests_number =$rn->requests_number;
$updated_requests_number=$old_requests_number+1;
$rn->update(['requests_number'=>$updated_requests_number]);
return redirect()->route('DHrequest',['DH'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
    }

    public function IThistory($worker){
        $user=Worker::where('id',$worker)->first();
        $data1=Itrequest::where('requestor_id',$worker)->get();
       $requests_number=$data1->count();
    

        return view ('DHpage.ITdhHistory',['worker'=>$worker,'data'=>$data1,'requests_number'=>$requests_number]);
    }
    public function SThistory($worker){
        $user=Worker::where('id',$worker)->first();
        $data2=Strequest::where('requestor_id',$worker)->get();
    
        $requests_number=$data2->count();
    
    
        return view ('DHpage.STdhHistory',['worker'=>$worker,'data'=>$data2,'requests_number'=>$requests_number]);
    }
    public function history($worker){
        $user=Worker::where('id',$worker)->first();
        $data1=Itrequest::where('requestor_id',$worker)->get();
        $data2=Strequest::where('requestor_id',$worker)->get();
        $mergedData = $data1->concat($data2);
       $sortedData = $mergedData->sortBy('reference');
       $requests_number=$user->requests_number;
    
    //dd($sortedData);
        return view ('DHpage.DhHistory',['worker'=>$worker,'data'=>$sortedData,'requests_number'=>$requests_number]);
    }
    public function requestHistory($worker,$reference){
     $user=Worker::where('id',$worker)->first();
     if($user->department=="IT"){
         $data1=Itrequest::where('reference',$reference)->first();
         $user2=Worker::where('id',$data1->requestor_id)->first();
         $now=$data1->created_at;
         $name=$user2->name;
            $lastname=$user2->last_name;
            $cin=$user2->cin;
            $rank=$user2->rank;
            $department=$user2->department;
         return view('DHpage.DHoneHistory',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
        'department'=>$department,'date'=>$now ,'order'=>$data1 ]) ;
        
     }else{
        $data2=Strequest::where('reference',$reference)->first();
        $user2=Worker::where('id',$data2->requestor_id)->first();
        $now=$data2->created_at;
        $name=$user2->name;
            $lastname=$user2->last_name;
            $cin=$user2->cin;
            $rank=$user2->rank;
            $department=$user2->department;
        return view('DHpage.DHoneHistory',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
        'department'=>$department,'date'=>$now ,'order'=>$data2 ]) ;
     }
       
        
        //dd($data1);
      //  $referenceToFind = $reference; // Replace with the actual reference value you're looking for
    
   // $foundItem = $mergedData->first(function ($item) use ($reference) {
    //    return $item->reference == $reference;
   // });
    
    //dd($foundItem);
    
           // $name=$user2->name;
          //  $lastname=$user2->last_name;
           // $cin=$user2->cin;
          //  $rank=$user2->rank;
           // $department=$user2->department;
            //dd($foundItem);
            //$now=$foundItem->created_at;
            
  //  if ($foundItem) {
        
   // } else {
        // Item not found
     //   abort(404);
   // }
        //dd($oneOrder);
        
    
    
    
    
        //return view('DHpage.DHoneHistory',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
        //'department'=>$department,'date'=>$now ,'order'=>$foundItem ]) ;
    }


public function approvals($worker){
    return view('DHpage.DHapprovalsPage',['worker'=>$worker]);
}

public function waiting($worker){
    $user=Worker::where('id',$worker)->first();
    $department=$user->department;
    
    
    if($user->department=="IT"){
        $data1=Itrequest::where('DH_approval',"none")->get();
        $requests_number=$data1->count();
//dd($data1);
    return view('DHpage.Dhwaiting',['worker'=>$worker,'data'=>$data1,'requests_number'=>$requests_number,'department'=>$department]);
    }
    if($user->department=="Stationery"){
        $data2=STrequest::where('DH_approval',"none")->get();
//dd($data2);
  $requests_number=$data2->count();

   return view('DHpage.Dhwaiting',['worker'=>$worker,'data'=>$data2,'requests_number'=>$requests_number,'department'=>$department,]);
   }
}
public function DHapprove($worker,$reference){
    $user=Worker::where('id',$worker)->first();
    $data1=Itrequest::where('reference',$reference)->first();
    $data2=Strequest::where('reference',$reference)->first();
    if($user->department=="Stationery"){
    $data2->DH_approval="True";
    $data2->save();
        return to_route('DhWaiting',[$worker]);
  }
  if($user->department=="IT"){
    $data1->DH_approval="True";
    $data1->save();
        return to_route('DhWaiting',[$worker]);
  }
}

public function DHdisapprove($worker,$reference){
    $user=Worker::where('id',$worker)->first();
    $data1=Itrequest::where('reference',$reference)->first();
    $data2=Strequest::where('reference',$reference)->first();
    if($user->department=="Stationery"){
    $data2->DH_approval="False";
    $data2->save();
        return to_route('DhWaiting',[$worker]);
  }
  if($user->department=="IT"){
    $data1->DH_approval="False";
    $data1->save();
        return to_route('DhWaiting',[$worker]);
  }
}
public function DHapproved($worker){
    $user=Worker::where('id',$worker)->first();
    $department=$user->department;
    
    
    if($user->department=="IT"){
        $data3=Itrequest::where('DH_approval', '!=',"none")->get();
        $requests_number=$data3->count();
//dd($data1);
    return view('DHpage.DHapproved',['worker'=>$worker,'data'=>$data3,'requests_number'=>$requests_number,'department'=>$department]);
    }
    if($user->department=="Stationery"){
        $data4=STrequest::where('DH_approval', '!=',"none")->get();
  $requests_number=$data4->count();

   return view('DHpage.DHapproved',['worker'=>$worker,'data'=>$data4,'requests_number'=>$requests_number,'department'=>$department,]);
   }
}
}






