<?php

namespace App\Repository;

interface TenantsRepositoryInterface
{
   public function getAllTenants();

   public function deleteTenantById($id);

    public function getAllCategory();

}
