<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    #table name
    protected $table = 'categories';
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
     * product relation: get all related products
     *
     * @return collection
    */
    public function product()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
