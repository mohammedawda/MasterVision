<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    #table name
    protected $table = 'products';
    #confirm related table has timestamps columns
    public $timestamps  = true;
    #hide timestamps from any DB manipulations
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
    */
    protected $fillable = ['name', 'description'];

    /**
     * shop relation: get all related products
     *
     * @return collection
    */
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

     /**
     * category relation: get all related products
     *
     * @return collection
    */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
