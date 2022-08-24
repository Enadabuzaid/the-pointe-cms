<?php
namespace App\Http\Controllers\Menus;
use App\Http\Controllers\Controller;
use App\Repository\MenuRepositoryInterface;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    protected $menus;

    public function __construct(MenuRepositoryInterface $menus)
    {
        $this->menus = $menus;
        $this->middleware('auth');
    }

    public function index(){
        $menus = $this->menus->getAllMenus();
        return view('admin.menu.index',compact('menus'));
    }

    public function store(Request $request){
        return $this->menus->storeMenus($request);
    }

    public function destroy(Request $request){
        return $this->menus->destroy($request);
    }

    public function switchStatus(Request $request){
        return $this->menus->switch($request);
    }

    public function update(Request $request){
        return $this->menus->update($request);
    }


}
