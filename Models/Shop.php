<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Shop extends Model
{
   
   
    protected $table = 'shops';

    public function getShop($fromDate,$toDate) {
        return Order::where('shop_id', 'id');
    }
}