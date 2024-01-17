<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
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
}
