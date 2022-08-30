<?php
namespace App\Http\Controllers\Sliders;
use App\Http\Controllers\Controller;
use App\Repository\SliderRepositoryInterface;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    protected $sliders;

    public function __construct(SliderRepositoryInterface $sliders)
    {
        $this->sliders = $sliders;
        $this->middleware('auth');
    }

    public function index(){
        $sliders = $this->sliders->getAllSliders();
        return view('admin.slider.index',compact('sliders'));
    }

    public function store(Request $request){
        return $this->sliders->storeSliders($request);
    }

    public function destroy(Request $request){
        return $this->sliders->destroy($request);
    }

    public function switchStatus(Request $request){
        return $this->sliders->switch($request);
    }

    public function update(Request $request){
        return $this->sliders->update($request);
    }


}
