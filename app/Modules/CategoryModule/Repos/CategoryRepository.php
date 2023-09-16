<?php

namespace App\Modules\CategoryModule\Repos;

use App\Models\Category;

class CategoryRepository
{
    public function allSubCats($with = [])
    {
        return Category::whereNull('deleted_at')->whereNotNull('parent_id')->with($with)->get();
    }
    
}