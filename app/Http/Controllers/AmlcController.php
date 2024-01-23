<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Itrequest;
use App\Models\Strequest;

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
}
