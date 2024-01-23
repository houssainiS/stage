<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\User;
use App\Models\Itrequest;
use App\Models\Strequest;

class DafController extends Controller
{
    public function goDAF($DAF){
        return view('DAFpage.welcome',['worker'=>$DAF]);
    
    }
}
