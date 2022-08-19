<?php
namespace App\Repository;


use App\Models\Tenant\TenantsCategory;
use Exception;

class TenantsCategoryRepository implements TenantsCategoryRepositoryInterface{

    public function getAllTenantsCategory(){
       return $tenants_category = TenantsCategory::all();
    }

    public function getAllTenantsCategoryById($parent_id){
        return $tenants_category = TenantsCategory::all()->where('parent_id','=' , 1);
    }

    public function getAllParentTenants(){
        return $tenants_category = TenantsCategory::all()->where('parent_id','=',0);
    }

    public function getAllSubTenants($parent_id){

    }


    public function storeTenantsCategory($request){

        try {
            $tenantCategory = new TenantsCategory();
            $tenantCategory->tenants_category_name_en = $request->category_name_en;
            $tenantCategory->tenants_category_name_ar = $request->category_name_ar;
            $tenantCategory->tenants_category_desc_en = $request->category_desc_en;
            $tenantCategory->tenants_category_desc_ar = $request->category_desc_ar;

            if($request->check == "on"){
                $tenantCategory->parent_id =$request->parent_id ;
            } else{
                $tenantCategory->parent_id = 0; // this is main category
            }

            $tenantCategory->save();

            return redirect()->route('tenants-category.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

}
