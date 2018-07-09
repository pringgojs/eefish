<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getOrder()
    {
        return $this->hasOne('App\Models\Order', 'id', 'orde_item_orders_id');
    }

    public function getFishItem()
    {
        return $this->hasOne('App\Models\FishItem', 'id', 'fish_items_id');
    }

}