<?php

namespace App\Repository;

use App\Models\Tenant\Tenant;
use App\Models\Tenant\TenantsCategory;

class TenantsRepository implements TenantsRepositoryInterface
{

    public function getAllTenants(){
        return $tenants =  Tenant::all();
    }

    public function getAllCategory(){
        return $tenants = TenantsCategory::all();
    }

    public function deleteTenantById($id){
        return $tenants = Tenant::Where('tenant_id','=',$id)->delete();
    }


}


