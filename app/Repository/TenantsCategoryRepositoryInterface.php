<?php

namespace App\Repository;

interface TenantsCategoryRepositoryInterface{

    // get all TenantsCategory
    public function getAllTenantsCategory();


    // Create TenantsCategory
    public function storeTenantsCategory($request);

    public function getAllTenantsCategoryById($parent_id);


    public function getAllParentTenants();

    public function getAllSubTenants($parent_id);

}
