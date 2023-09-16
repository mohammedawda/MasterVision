<?php 

namespace App\Modules\ShopModule;

use App\Modules\ShopModule\Managers\ShopManager;
use App\Modules\ShopModule\Repos\ShopRepository;

class EntryPoint
{
    public function latestProducts($shop_id)
    {
        $shopObj = new ShopManager(new ShopRepository);
        return $shopObj->latestProducts($shop_id);
    }

    public function storeOrder($orderData)
    {
        $shopObj = new ShopManager(new ShopRepository);
        return $shopObj->storeOrder($orderData);
    }

    public function productSelectLimit($shop_id)
    {
        $shopObj = new ShopManager(new ShopRepository);
        return $shopObj->productSelectLimit($shop_id);
    }
}
