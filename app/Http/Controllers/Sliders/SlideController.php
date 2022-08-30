<?php
namespace App\Http\Controllers\Sliders;
use App\Http\Controllers\Controller;
use App\Repository\SlideRepositoryInterface;
use Illuminate\Http\Request;

class SlideController extends Controller
{

    protected $slides;

    public function __construct(SlideRepositoryInterface $slides)
    {
        $this->slides = $slides;
        $this->middleware('auth');
    }

    public function index($id){
        $slides = $this->slides->getAllSlides();
        $sliderinfo =  $this->slides->getSliderInfo($id);

        return view('admin.slider.slide',compact('slides','sliderinfo'));
    }

    public function store(Request $request){
        return $this->slides->storeSlides($request);
    }

    public function destroy(Request $request){
        return $this->slides->destroy($request);
    }

    public function switchStatus(Request $request){
        return $this->slides->switch($request);
    }

    public function update(Request $request){
        return $this->slides->update($request);
    }


}
