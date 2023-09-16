<?php 

namespace App\Modules\CategoryModule\Managers;

use App\Modules\CategoryModule\Repos\CategoryRepository;
use Exception;

class CategoryManager
{
    public function __construct(private CategoryRepository $categoryRepository)
    {    
    }

    public function CatChildren($cat_id)
    {
        try{
            $allSubCats = $this->categoryRepository->allSubCats(['product']);
            if($allSubCats->isEmpty()) {
                throw new Exception("No sub category founded !");
            }
            $catcChildren = $this->get_children_tree($cat_id, $allSubCats);
            return response()->json($catcChildren);
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function get_children_tree($cat_id, $allSubCats)
    {
        $childrenList = [];$i=0;static $listOfIds = [];
        $directChildren = $allSubCats->where('parent_id', $cat_id);
        $listOfIds[] = $cat_id;
        foreach ($directChildren as $directChild){
            if(in_array($directChild->id, $listOfIds)) {
                continue;
            }
                $selectChildData = $directChild;
                $childrenList[$i] = $selectChildData;
                $childrenList[$i++]['children'] = $this->get_children_tree($directChild->id, $allSubCats);
        }
        return $childrenList;
    }
}
