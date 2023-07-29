<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;


class Order extends Model
{
     protected $table = 'orders';

     public function getOrder($fromDate,$toDate) {
          return Shops::where('shop_id','id' );

     }
}
