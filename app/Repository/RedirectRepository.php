<?php

namespace App\Repository;

use App\Models\Redirect;

class RedirectRepository implements RedirectRepositoryInterface
{

    public function getAllRedirects(){
        return $redirects = Redirect::all();
    }




}


