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
    return redirect()->route('test')->with('success', 'Worker registered successfully!')->with('showalert', true);
   }
   }
    


public function registerStore()
{
    // Create a new worker
    $worker = new Worker();
    
    $worker->username = request()->username;
    $worker->name = request()->name;
    $worker->last_name = request()->last_name;
    $worker->email = request()->email;
    $worker->password = request()->password; // Password hashing handled automatically
    $worker->age = request()->age;
    $worker->cin = request()->id;
    $worker->phone_number = request()->phone_number;
    $worker->rank = request()->rank;
    $worker->rank_code = request()->rank_code;
    $worker->department = request()->department;
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

public function test(){
    return view('test');
}
}
