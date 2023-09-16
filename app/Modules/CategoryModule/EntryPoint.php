<?php 

namespace App\Modules\CategoryModule;

use App\Modules\CategoryModule\Managers\CategoryManager;
use App\Modules\CategoryModule\Repos\CategoryRepository;

class EntryPoint
{

    public function CatChildren($cat_id)
    {
        $catObj = new CategoryManager(new CategoryRepository);
        return $catObj->CatChildren($cat_id);
    }

}