<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Modules\ShopModule\Requests\AddOrderRequest;

class ShopController extends Controller
{   
    /**
     * display add order form
     * @param int $shop_id
    */
    public function getForm($shop_id)
    {
        $shopProducts = loadModule('shop')->productSelectLimit($shop_id);
        return view('Shop.orders', compact('shopProducts', 'shop_id'));
    }

    /**
     * store order
     * @param request $request
    */
    public function storeOrder(AddOrderRequest $request)
    {
        $orderData = $request->all();
        $response = loadModule('shop')->storeOrder($orderData);
        return $response;
    }    

}
