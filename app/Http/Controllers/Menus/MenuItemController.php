<?php
namespace App\Http\Controllers\Menus;
use App\Http\Controllers\Controller;

use App\Repository\MenuItemRepositoryInterface;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{

    protected $menuitems;

    public function __construct(MenuItemRepositoryInterface $menuitems)
    {
        $this->menuitems = $menuitems;
        $this->middleware('auth');
    }

    public function index($id){
        $menuitems = $this->menuitems->getAllMenuItems();
        $menuinfo =  $this->menuitems->getMenuInfo($id);
        return view('admin.menu.itemlist',compact('menuitems','menuinfo'));
    }

    public function store(Request $request){
        return $this->menuitems->storeMenuItems($request);
    }

    public function destroy(Request $request){
        return $this->menuitems->destroy($request);
    }

    public function switchStatus(Request $request){
        return $this->menuitems->switch($request);
    }

    public function update(Request $request){
        return $this->menuitems->update($request);
    }


}
