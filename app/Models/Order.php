<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'order_users_id');
    }

    public function getOrderItems()
    {
        return $this->hasMany('App\Models\OrderItem', 'orde_item_orders_id', 'id');
    }

    public function getPeriod()
    {
        return $this->hasOne('App\Models\Period', 'id', 'orde_item_orders_id');
    }

    public function getOrderKind()
    {
        return $this->hasOne('App\Models\OrderKind', 'id', 'order_order_kinds_id');
    }

    public function getOrderStatus()
    {
        return $this->hasOne('App\Models\OrderStatus', 'id', 'order_order_status_id');
    }

    public function getPaymentType()
    {
        return $this->hasOne('App\Models\PaymentType', 'id', 'order_payment_types_id');
    }
    
}