<?php

namespace App\Repository;

interface SlideRepositoryInterface
{
    public function getSliderInfo($id);

    public function getAllSlides();

    public function storeSlides($request);

    public function destroy($request);

    public function switch($request);

    public function update($request);


}
