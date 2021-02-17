<?php

namespace App\Services;
use Illuminate\Support\Facades\Gate;
//goi policy
use App\Policies\ProductPolicy;
use App\Policies\CategoryPolicy;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicyAccess()
    {
        $this -> defineGateCategory();
        $this -> defineGateProduct();
    }

    //phan quyen cho category
    public function defineGateCategory()
    {
        Gate::define('category-list',[CategoryPolicy::class,'view']);
        Gate::define('category-add',[CategoryPolicy::class,'create']);
        Gate::define('category-edit',[CategoryPolicy::class,'update']);
        Gate::define('category-delete',[CategoryPolicy::class,'delete']); 
    }

    //phan quyen cho product
    public function defineGateProduct()
    {
        Gate::define('product-edit',[ProductPolicy::class,'update']); 
    }
}
