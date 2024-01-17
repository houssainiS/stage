<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
class WorkerController extends Controller
{
    public function aboutme($worker){

        return view('workersPage.aboutme',['worker'=>$worker]);
    }
}
