<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    #table name
    protected $table = 'orders';
    #confirm related table has timestamps columns
    public $timestamps  = true;
    #hide timestamps from any DB manipulations
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
    */
    protected $fillable = ['user_id', 'total', 'promo_code'];

    
    /**
     * orderItem relation: get all related order items
     *
     * @return object
    */
    public function orderItem()
    {
        return $this->hasOne(OrderItem::class, 'order_id');
    }

}
