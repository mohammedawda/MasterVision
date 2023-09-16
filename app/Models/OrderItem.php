<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    
    #table name
    protected $table = 'order_items';
    #confirm related table has timestamps columns
    public $timestamps  = true;
    #hide timestamps from any DB manipulations
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
    */
    protected $fillable = ['product_id', 'order_id'];

    /**
     * order relation: get all related orders
     *
     * @return object
    */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
