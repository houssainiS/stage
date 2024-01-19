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
}
