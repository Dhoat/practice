<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shop;
use App\Models\WeeklyReport;


class TestController extends Controller
{
    public function index(){
        return view('collaction');
        
    }
    public function ArrCollaction(){
        return ("collactions");
        
    }

    
}
