<?php

namespace App\Repository;

interface MenuRepositoryInterface
{
    public function getAllMenus();

    public function storeMenus($request);

    public function destroy($request);

    public function switch($request);

    public function update($request);


}
