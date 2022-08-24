<?php

namespace App\Repository;

interface MenuItemRepositoryInterface
{
    public function getMenuInfo($id);
    
    public function getAllMenuItems();

    public function storeMenuItems($request);

    public function destroy($request);

    public function switch($request);

    public function update($request);


}
