<?php

namespace App\Repository;

interface SliderRepositoryInterface
{
    public function getAllSliders();

    public function storeSliders($request);

    public function destroy($request);

    public function switch($request);

    public function update($request);


}
