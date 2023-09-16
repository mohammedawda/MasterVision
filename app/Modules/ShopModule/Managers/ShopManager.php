<?php 

namespace App\Modules\ShopModule\Managers;

use App\Modules\ShopModule\Repos\ShopRepository;
use Exception;

class ShopManager
{
    public function __construct(private ShopRepository $shopRepository)
    {    
    }

    public function latestProducts($shop_id)
    {
        try{
            $latest = $this->shopRepository->latestProducts($shop_id);
            return response()->json($latest);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function storeOrder($orderData)
    {
        try{
            if(empty($orderData)) {
                return new Exception('Empty Order Data!');
            }
            $insData = $this->preOrderData($orderData);
            $order_id = $this->shopRepository->storeOrder($insData);
            unset($insData);
            $insData = $this->preOrderItemsData($order_id, $orderData['products']);
            $status = $this->shopRepository->storeOrderItems($insData);
            if($status) {
                return 'order added successfuly';
            }
            return 'there is a problem in add order!!!';
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function productSelectLimit($shop_id)
    {
        try{
            $products = $this->shopRepository->allShopProducts($shop_id, ['id', 'name', 'price']);
            return $products;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    private function preOrderData($orderData)
    {
        $total = 0;
        $ins_data['mobile'] = $orderData['mobile'] ?? ''; 
        if(!empty($orderData['products'])) {
            $product = json_decode($orderData['products']);
            $total += (int)($product->price);
        }
        $ins_data['total'] = $total;
        return $ins_data;
    }
    
    private function preOrderItemsData($order_id, $products)
    {
        $ins_data = []; 
        if($order_id) {
            $product = json_decode($products);
            $ins_data['order_id'] = $order_id;
            $ins_data['product_id'] = $product->id;
        }
        return $ins_data;
    }
    
}
