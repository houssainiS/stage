<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Itrequest;
use App\Models\Strequest;
use App\Models\Pr;
class BodController extends Controller
{
    public function goBOD($BOD){
        return view('BODpage.welcome',['worker'=>$BOD]);
    
    }

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

        return view('BODpage.aboutme',['worker'=>$worker,'username'=>$username,'name'=>$name,'lastname'=>$lastname,'email'=>$email,
        'age'=>$age,'phone'=>$phone,'rank'=>$rank,'department'=>$department,'requests_number'=>$requests_number,'id'=>$cin,]);
    }

    public function request($worker){
        return view ('BODpage.BODrequest',['worker'=>$worker]);
    }

    public function ITrequestOrder($worker){
        $user=Worker::where('id',$worker)->first();
        $name=$user->name;
        $lastname=$user->last_name;
        $cin=$user->cin;
        $rank=$user->rank;
        $department=$user->department;
        $now=now();
        return view ('BODpage.ITbodRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
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
        return view ('BODpage.STbodRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank,
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
return redirect()->route('BODrequest',['bod'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
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
return redirect()->route('BODrequest',['bod'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
    }

    public function IThistory($worker){
        $user=Worker::where('id',$worker)->first();
        $data1=Itrequest::where('requestor_id',$worker)->get();
       $requests_number=$data1->count();
    

        return view ('BODpage.ITbodHistory',['worker'=>$worker,'data'=>$data1,'requests_number'=>$requests_number]);
    }
    public function SThistory($worker){
        $user=Worker::where('id',$worker)->first();
        $data2=Strequest::where('requestor_id',$worker)->get();
    
        $requests_number=$data2->count();
    
    
        return view ('BODpage.STbodHistory',['worker'=>$worker,'data'=>$data2,'requests_number'=>$requests_number]);
    }

    public function history($worker){
        $user=Worker::where('id',$worker)->first();
        $data1=Itrequest::where('requestor_id',$worker)->get();
        $data2=Strequest::where('requestor_id',$worker)->get();
        $mergedData = $data1->concat($data2);
       $sortedData = $mergedData->sortBy('reference');
       $requests_number=$user->requests_number;
    
    //dd($sortedData);
        return view ('BODpage.BODHistory',['worker'=>$worker,'data'=>$sortedData,'requests_number'=>$requests_number]);
    }


    public function BODoneHistory($worker,$reference){
        $user=Worker::where('id',$worker)->first();
        $data1=Itrequest::where('requestor_id',$worker)->get();
        $data2=Strequest::where('requestor_id',$worker)->get();
        $mergedData = $data1->concat($data2);
    
        $referenceToFind = $reference; // Replace with the actual reference value you're looking for
    
    $foundItem = $mergedData->first(function ($item) use ($reference) {
        return $item->reference == $reference;
    });
    
    //dd($foundItem);
    
            $name=$user->name;
            $lastname=$user->last_name;
            $cin=$user->cin;
            $rank=$user->rank;
            $department=$user->department;
            $now=$foundItem->created_at;
            
    if ($foundItem) {
        
    } else {
        // Item not found
        abort(404);
    }
        //dd($oneOrder);
        //dd($user->department);
    if($user->department=="IT"){
        $dep="IT";
    }
    if($user->department=="Stationery"){
        $dep="ST";
    }
    
    
    
        return view('BODpage.BODoneHistory',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
        'department'=>$department,'date'=>$now ,'order'=>$foundItem , "dep"=>$dep]) ;
    }

    public function work($worker){
        return view('BODpage.work',['worker'=>$worker]);
    }
    public function PRapprove($worker){
        $user=Worker::where('id',$worker)->first();
        $data = Pr::where('PR_line_id',0)->where('DAF_approval','True') //->where('BOD1_signature','none')
        ->get();
            $requests_number=$data->count();
    //dd($data);
        return view('BODpage.PRapprove',['worker'=>$worker,'data'=>$data,'requests_number'=>$requests_number,]);
    }

    public function onePr($worker,$PR_id){
        $user=Worker::where('id',$worker)->first();
        $data=Pr::where('PR_id',$PR_id)->get();
        //dd($data[0]->sentBy);
        $user2=Worker::where('id',$data[0]->sentBy)->first();
        $bod1=Worker::where('id',$data[0]->BOD1)->first();
        $bod2=Worker::where('id',$data[0]->BOD2)->first();
        

        return view ('BODpage.oneRequest',['worker'=> $worker,'PR_id'=>$PR_id,'user'=>$user,'data'=>$data,'user2'=>$user2,
    'bod1'=>$bod1,'bod2'=>$bod2]);

    }

    public function approvePR($worker,$reference){
        $user=Worker::where('id',$worker)->first();
        $data=Pr::where('id',$reference)->first();
       // dd($data);
       if ($data->BOD1_signature === 'True' &&  $data->BOD1 != $worker) {
        // Update BOD2_signature to 'True'
        $data->BOD2_signature = 'True';
        $data->BOD2=$worker;
        $data->approval_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();

        // Update approval date with the current timestamp
        $data->BOD2_approval_date = now()->format('Y-m-d H:i:s');
        $data->save();
        return to_route('BODwork.PRapprove',[$worker]);
    }

       else{
        $data->BOD1_signature="True";
        $data->BOD1=$worker;
        $data->BOD1_approval_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();
            return to_route('BODwork.PRapprove',[$worker]);
       
       }
      
    
    }

    public function disapprovePR($worker,$reference){
        $user=Worker::where('id',$worker)->first();
        $data=Pr::where('id',$reference)->first();
       // dd($data);

       if ($data->BOD1_signature === 'True' &&  $data->BOD1 != $worker) {

        $data->BOD2_signature = 'False';
        $data->BOD2=$worker;
        $data->approval_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();

        // Update approval date with the current timestamp
        $data->BOD2_approval_date = now()->format('Y-m-d H:i:s');
        $data->save();
        return to_route('BODwork.PRapprove',[$worker]);
    }

       else{
        $data->BOD1_signature="False";
        $data->save();
        $data->approval_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();
            return to_route('BODwork.PRapprove',[$worker]);
       }
        
      
    
    }

    public function approved($worker){
        $user=Worker::where('id',$worker)->first();
        $data = Pr::where('PR_line_id',0)->whereIn('BOD1_signature', ['True', 'False'])
        ->get();
            $requests_number=$data->count();
        return view('BODpage.PRapproved',['worker'=>$worker,'data'=>$data,'requests_number'=>$requests_number]);
    }

    public function approveQ($worker){
        $user=Worker::where('id',$worker)->first();
        $data = Pr::where('BOD2_signature','True')->whereNotNull('quotation')//->where('quotation_approval1',null)
        ->get();
            
            $requests_number=$data->count();
            

        return view('BODpage.quotationToApprove',['worker'=>$worker,'data'=>$data,'requests_number'=>$requests_number,]);
       

    }
    public function approveQuotation($worker,$reference){
        $user=Worker::where('id',$worker)->first();
        $data=Pr::where('PR_id',$reference)->first();
       //dd($data);
       if ($data->quotation_approval1 === 'True' &&  $data->QBOD1 != $worker) {
        // Update BOD2_signature to 'True'
        $data->quotation_approval2 = 'True';
        $data->QBOD2=$worker;
        $data->quotation_approval2_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();
        return to_route('BODwork.approveQ',[$worker]);
    }

       else{
        $data->quotation_approval1 = 'True';
        $data->QBOD1=$worker;
        $data->quotation_approval1_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();
            return to_route('BODwork.approveQ',[$worker]);
       
       }
    }

public function approvedQuotation($worker){
    $user=Worker::where('id',$worker)->first();
    $data = Pr::where('PR_line_id',0)->whereIn('quotation_approval1', ['True', 'False'])
    ->get();
    
        $requests_number=$data->count();
    //dd($data);
    return view('BODpage.approvedQ',['worker'=>$worker,'data'=>$data,'requests_number'=>$requests_number]);
}

public function disapproveQuotation($worker,$reference){
    $user=Worker::where('id',$worker)->first();
    $data=Pr::where('PR_id',$reference)->first();
   //dd($data);
   if ($data->quotation_approval1 === 'True' &&  $data->QBOD1 != $worker) {
    $data->quotation_approval2 = 'False';
    $data->QBOD2=$worker;
    $data->quotation_approval2_date=$data->updated_at->format('Y-m-d H:i:s');
    $data->save();
    return to_route('BODwork.approveQ',[$worker]);
}

   else{
    $data->quotation_approval1 = 'False';
    $data->QBOD1=$worker;
    $data->quotation_approval1_date=$data->updated_at->format('Y-m-d H:i:s');
    $data->save();
        return to_route('BODwork.approveQ',[$worker]);
   
   }
}
}