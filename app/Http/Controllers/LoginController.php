<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
class LoginController extends Controller
{
    public function login(){
        return view('login'); 
   }
   public function register(){
        return view('register');
   }

   public function loginTest(){
    $name=request()->username;
    $password=request()->password;
    $rank=request()->rank;
    $user=Worker::where('name',$name)->first();
   // dd($password,$user['password'],$rank,$user['rank']);
    if(!$user || $user->password!=$password || $user->rank!=$rank){
        return  redirect()->back()->with('error', 'Wrong Username , Password or Rank. Try again.')->with('showalert', true);
   }
   else{
    return redirect()->route('goWorker',$user->id)->with('success', 'Worker registered successfully!')->with('showalert', true);
   }
   }
    


public function registerStore()
{ 
    $rank = request()->rank;
    $rank_code=request()->rank_code;
    $department=request()->department;
    if($department=="other"){
        $rank_code="111";
        $rank="Worker";
    }
    if($rank_code == "555" && $rank=="BOD"){
        $ranktest=true;
    }elseif($rank_code =="444" && $rank=="Asset managment and logistic coordinator"){
        $ranktest=true;
    }elseif($rank_code =="333" && $rank=="DAF"){
        $ranktest=true;
    }elseif($rank_code =="222" && $rank=="Department head"){
        $ranktest=true;
    }elseif($rank_code =="111" && $rank=="Worker"){
        $ranktest=true;
    }else{
        $ranktest=false;
    }
  
    //dd($ranktest);
    if($ranktest){
        $worker = new Worker();
    
    $worker->username = request()->username;
    $worker->name = request()->name;
    $worker->last_name = request()->last_name;
    $worker->email = request()->email;
    $worker->password = request()->password; // Password hashing handled automatically
    $worker->age = request()->age;
    $worker->cin = request()->id;
    $worker->phone_number = request()->phone_number;
    $worker->rank = $rank;
    $worker->rank_code = $rank_code;
    $worker->department = $department;
    $worker->requests_number=0;

    try {
        $worker->save();
        // Redirect to success page on successful registration
        return redirect()->route('login')->with('success', 'Worker registered successfully!')->with('showAlert', true);
    } catch (\Illuminate\Database\QueryException $exception) {
        if ($exception->getCode() == 23000) {
            // Handle duplicate username error
            return redirect()->back()->with('error', 'Username or email already exists. Please choose a different one.')->with('showAlert', true);

        } else {
            // Handle other database errors
            throw $exception; // Re-throw exception for further handling
        }
    }
    }
    else{
        return redirect()->back()->with('error', 'Rank code is false. Please correct it.')->with('showAlert', true);
    }
    
    
    
}

public function test(){
    return view('test');
}

public function welcome() {
    return view('welcome');
}
public function goWorker($worker){
    return view('workersPage.workerPage',['worker'=>$worker]);
}
}
