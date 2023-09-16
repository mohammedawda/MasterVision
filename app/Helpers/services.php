<?php

if (!function_exists('loadModule')) {
    function loadModule(string $servicesName)
    {
        switch ($servicesName) {
            case 'shop':
                return new \App\Modules\ShopModule\EntryPoint;
                break;
            case 'category':
                return new \App\Modules\CategoryModule\EntryPoint;
                break;
            default:
                throw (new \Exception("Repo not found"));
                break;
        }
    }
}
