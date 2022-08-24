<?php

namespace App\Repository;

interface RedirectRepositoryInterface
{
    public function getAllRedirects();

    public function storeRedirects($request);

    public function destroy($request);

    public function switch($request);

    public function update($request);


}
