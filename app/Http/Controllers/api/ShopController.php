<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    /**
     * get latest shop products
     * @param int $shop_id
     * @return collection
    */
    public function latestProducts($shop_id)
    {
        if(empty($shop_id)) {
            return response()->json([
                "status" => false,
                "message" => "missing headers",
                "code" => 204,
            ], 411);
        }
        $latest = loadModule('shop')->latestProducts($shop_id);
        return $latest;	
    }  

}
