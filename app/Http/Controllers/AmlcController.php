<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Itrequest;
use App\Models\Strequest;
use App\Models\Pr;

class AmlcController extends Controller
{
    public function goAMLC($AMLC){
        return view('AMLCpage.welcome',['worker'=>$AMLC]);
    
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

        return view('AMLCpage.aboutme',['worker'=>$worker,'username'=>$username,'name'=>$name,'lastname'=>$lastname,'email'=>$email,
        'age'=>$age,'phone'=>$phone,'rank'=>$rank,'department'=>$department,'requests_number'=>$requests_number,'id'=>$cin,]);
    }
    public function request($worker){
        return view ('AMLCpage.AMLCrequest',['worker'=>$worker]);
    }
    public function ITrequestOrder($worker){
        $user=Worker::where('id',$worker)->first();
        $name=$user->name;
        $lastname=$user->last_name;
        $cin=$user->cin;
        $rank=$user->rank;
        $department=$user->department;
        $now=now();
        return view ('AMLCpage.ITamlcRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
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
        return view ('AMLCpage.STamlcRequestPage',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank,
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
return redirect()->route('AMLCrequest',['amlc'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
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
return redirect()->route('AMLCrequest',['amlc'=>$workerid])->with('success', 'Worker requested successfully!')->with('showAlert', true);
    }

    public function IThistory($worker){
        $user=Worker::where('id',$worker)->first();
        $data1=Itrequest::where('requestor_id',$worker)->get();
       $requests_number=$data1->count();
    

        return view ('AMLCpage.ITamlcHistory',['worker'=>$worker,'data'=>$data1,'requests_number'=>$requests_number]);
    }
    public function SThistory($worker){
        $user=Worker::where('id',$worker)->first();
        $data2=Strequest::where('requestor_id',$worker)->get();
    
        $requests_number=$data2->count();
    
    
        return view ('AMLCpage.STamlcHistory',['worker'=>$worker,'data'=>$data2,'requests_number'=>$requests_number]);
    }

    public function history($worker){
        $user=Worker::where('id',$worker)->first();
        $data1=Itrequest::where('requestor_id',$worker)->get();
        $data2=Strequest::where('requestor_id',$worker)->get();
        $mergedData = $data1->concat($data2);
       $sortedData = $mergedData->sortBy('reference');
       $requests_number=$user->requests_number;
    
    //dd($sortedData);
        return view ('AMLCpage.AMLCHistory',['worker'=>$worker,'data'=>$sortedData,'requests_number'=>$requests_number]);
    }
    
    public function AMLConeHistory($worker,$reference){
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
    
    
    
        return view('AMLCpage.AMLConeHistory',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
        'department'=>$department,'date'=>$now ,'order'=>$foundItem , "dep"=>$dep]) ;
    }

    public function work($worker){
        return view('AMLCpage.AMLCworkPage',['worker'=>$worker]);
    }


    public function STrequestsToApprove($worker){
        $user=Worker::where('id',$worker)->first();
        $data = STrequest::where('AMLC_approval', 'none')
        ->where('DH_approval', 'True')
        ->where('AMLC_found','none')
        ->get();
            $requests_number=$data->count();
    //dd($data1);
        return view('AMLCpage.STreqToApprove',['worker'=>$worker,'data'=>$data,'requests_number'=>$requests_number,]);
       

    }

    public function AMLCSTapprove($worker,$reference){
        //$user=Worker::where('id',$worker)->first();
        $data=Strequest::where('reference',$reference)->first();
        $data->AMLC_approval="True";
        $data->save();
        $data->AMLC_approval_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();
            return to_route('AMLCwork.STrequests',[$worker]);
      
      
    }
    public function AMLCSTdisapprove($worker,$reference){
        //$user=Worker::where('id',$worker)->first();
        $data=Strequest::where('reference',$reference)->first();
        $data->AMLC_approval="False";
        $data->save();
        $data->AMLC_approval_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();
            return to_route('AMLCwork.STrequests',[$worker]);
      
      
    }
    public function AMLCSTfound($worker,$reference){
        //$user=Worker::where('id',$worker)->first();
        $data=Strequest::where('reference',$reference)->first();
        $data->AMLC_found="True";
        $data->save();
        $data->AMLC_found_date=$data->updated_at->format('Y-m-d H:i:s');
        $data->save();
            return to_route('AMLCwork.STrequests',[$worker]);
      
      
    }

    public function AMLConeRequest($worker,$reference){
        $data1=Itrequest::where('reference',$reference)->get();
        $data2=Strequest::where('reference',$reference)->get();
        $mergedData = $data1->concat($data2);
        
        $referenceToFind = $reference; // Replace with the actual reference value you're looking for
    
    $foundItem = $mergedData->first(function ($item) use ($reference) {
        return $item->reference == $reference;
    });
    $user=Worker::where('id',$foundItem->requestor_id)->first();
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

    
    
    
        return view('AMLCpage.AMLConeRequest',['worker'=>$worker,'name'=>$name,'lastname'=>$lastname,'id'=>$cin,'rank'=>$rank ,
        'department'=>$department,'date'=>$now ,'order'=>$foundItem ,]) ;
    }
    
    public function STrequestsFoundInStock($worker){
        $user=Worker::where('id',$worker)->first();
        $data = STrequest::where('AMLC_found','True')
        ->get();
            $requests_number=$data->count();
    //dd($data1);
        return view('AMLCpage.STreqFoundInStock',['worker'=>$worker,'data'=>$data,'requests_number'=>$requests_number,]);
       

    }
    public function requestsPrSent($worker){
        $user=Worker::where('id',$worker)->first();
        $data = Pr::where('sentBy',$worker)
        ->get();
            $requests_number=$data->count();
    //dd($data1);
        return view('AMLCpage.reqPrSent',['worker'=>$worker,'data'=>$data,'requests_number'=>$requests_number,]);
       

    }

    public function PRform($worker){
        $date=now();
        $user=Worker::where('id',$worker)->first();
        return view('AMLCpage.PRform',['worker'=>$worker,'date'=>$date,'name'=>$user->name,'rank'=>$user->rank]);
    }

    public function PRformStore($worker){
        $user = Worker::where('id', $worker)->first();

if ($user) {
    $user->increment('pr_number'); // Increment pr_number by 1
}

        $pr = new Pr();
        
        $pr->PR_reference = $user->id."-".$user->pr_number;
        $pr->sentBy = $user->id;
        $pr->PR_line_id=0;
        $pr->PR_id = $user->pr_number;
        $pr->project_name = request('project_name');
        $pr->project_code =request('project_code');
        $pr->PR_reference = request('reference');
        $pr->division_name = request('division_name');
        $pr->cost_center = request('cost_center');
        $pr->direct_supervisor =request('direct_supervisor');
        $pr->direct_supervisor_signature = 'none';
        $pr->DH = request('DH');
        $pr->BOD1 = request('BOD1');
        $pr->BOD2 = request('BOD2');
        $pr->BOD1_signature = 'none';
        $pr->BOD2_signature = 'none';
        $pr->approval_date = request('approval_date');
        $pr->explanation = request('explanation');
        $pr->DAF_approval = 'none';
        $pr->save();
        ///////////
        
        for($i=1;$i<35;$i++){
            $description = request('DESCRIPTION' . $i);
            //dd($description);
            if($description!=null){
                $pr = new Pr;
                $pr->PR_line_id=$i;
                $pr->PR_id = $user->pr_number;
                $pr->description = request('DESCRIPTION'.$i);
                $pr->quantity = request('QUANTITY'.$i);
                $pr->unit = request('UNIT'.$i);
                $pr->SRDR = request('SRDR'.$i);
                $pr->GCR = request('GCR'.$i);
                $pr->save();
            }
            
        }
        
        // give all the lines same id by using request number

        return redirect()->route('AMLCwork', ['amlc' => $worker])->with('success', 'PR sent successfully!')->with('showAlert', true);
    }

    public function onePr($worker,$PR_id){
        $user=Worker::where('id',$worker)->first();
        $data=Pr::where('PR_id',$PR_id)->get();
        //dd($data);

        return view ('AMLCpage.onePR',['worker'=> $worker,'PR_id'=>$PR_id,'user'=>$user,'data'=>$data]);

    }
}
