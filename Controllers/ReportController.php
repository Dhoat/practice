<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shop;
use App\Models\WeeklyReport;
use Carbon\Carbon;


class ReportController extends Controller
{
    public function index(){
        $this->generateWeeklyReport();
    }
    
    public function generateWeeklyReport_old() {
        $cDate = Carbon::now();
        //$cDate = new Carbon('2023-03-15');
        $fromDate = $cDate->startOfWeek()->toDateTimeString();
        $toDate   = $cDate->endOfWeek()->toDateTimeString();       
        $orders = Order::whereBetween('created_at', [$fromDate,$toDate])->get();
        $weeklyOrders = [];
        if(!empty($orders )) {
            foreach( $orders  as $order) {
                $weeklyOrders[$order->shop_id]['order_meta'][] = $order;
                $weeklyOrders[$order->shop_id]['net_amount'] = (isset($weeklyOrders[$order->shop_id]['net_amount']) ?$weeklyOrders[$order->shop_id]['net_amount']:0) + $order->price;
            }
        }
        if(!empty($weeklyOrders)) {
            foreach($weeklyOrders as $shopId => $data ) {
                $data = array(
                    'shop_id'    => $shopId, 
                    'order_meta' => json_encode($data['order_meta']), 
                    'from_date'  => $fromDate,
                    'to_date'    => $toDate,
                    'net_amount' => $data['net_amount']
                );
                WeeklyReport::insert($data);   
            }
        }     
    }

    public function generateWeeklyReport() {
        $cDate = Carbon::now();
        //$cDate = new Carbon('2023-03-15');
        $fromDate = $cDate->startOfWeek()->toDateTimeString();
        $toDate   = $cDate->endOfWeek()->toDateTimeString();       
        $orders = Order::whereBetween('created_at', [$fromDate,$toDate])->get();
        $weeklyOrders = [];
        if(!empty($orders )) {
            foreach( $orders  as $order) {
                $weeklyOrders[$order->shop_id]['order_meta'][] = $order;
                $weeklyOrders[$order->shop_id]['net_amount'] = (isset($weeklyOrders[$order->shop_id]['net_amount']) ?$weeklyOrders[$order->shop_id]['net_amount']:0) + $order->price;
            }
        }
        if(!empty($weeklyOrders)) {
            foreach($weeklyOrders as $shopId => $data ) {
                $weeklyReport = WeeklyReport::where(['shop_id'=>$shopId,'from_date'=> $fromDate,'to_date'=>$toDate])->first();
                if(is_null($weeklyReport)) {
                    $weeklyReport = new WeeklyReport;
                }               
                $weeklyReport->shop_id =  $shopId;
                $weeklyReport->order_meta = json_encode($data['order_meta']);
                $weeklyReport->from_date =  $fromDate;
                $weeklyReport->to_date   =  $toDate;
                $weeklyReport->net_amount = $data['net_amount'];
                $weeklyReport->save();
            }
        }
    } 
}
