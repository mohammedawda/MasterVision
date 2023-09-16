<?php

namespace App\Modules\ShopModule\Repos;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class ShopRepository
{
    public function latestProducts($shop_id)
    {
        return Product::orderBy('id', 'desc')->whereNull('deleted_at')->where('shop_id', $shop_id)->get()->unique('cat_id');
    }

    public function storeOrder($insData)
    {
        return Order::insertGetId($insData);
    }

    public function storeOrderItems($insData)
    {
        return OrderItem::insert($insData);
    }

    public function allShopProducts($shop_id, $select = [])
    {
        return Product::whereNull('deleted_at')->where('shop_id', $shop_id)->select($select)->get();
    }
}