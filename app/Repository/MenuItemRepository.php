<?php

namespace App\Repository;
use App\Models\Menu;
use App\Models\MenuItem;

class MenuItemRepository implements MenuItemRepositoryInterface
{

    public function getMenuInfo($id){
        return $menuitems = Menu::find($id);
    }
    public function getAllMenuItems(){
        return $menuitems = MenuItem::all();
    }

    public function storeMenuItems($request){
         
        $validated = $request->validate([
            'menu_id' => 'required',
            'title' => 'required',
            'url' => 'required',
         ]);
         MenuItem::create([

           
            "menu_id" => $request->menu_id,
            "title" => $request->title,
            "url" => $request->url,
            "parent_id" => $request->parent_id,
            "order" => $request->order,
            "status" => $request->status ]);

        session()->put('success','MenuItem Link Successfully Added.');
        return redirect()->back();
    }

    public function destroy($request){
        MenuItem::find($request->id)->delete();
        session()->put('delete','MenuItem Link Successfully deleted.');
        return redirect()->back();
    }

    public function switch($request){
        $menuitem = MenuItem::find($request->id);
        $menuitem->status = $request->type;
        $menuitem->save();
        session()->put('switch','MenuItem Link Successfully Switched.');
        return redirect()->back();
    }

    public function update($request){
        $validated = $request->validate([
            'menu_id' => 'required',
            'title' => 'required',
            'url' => 'required',
        ]);

        $menuitem = MenuItem::find($request->id);

        $menuitem->update([
            "menu_id" => $request->menu_id,
            "title" => $request->title,
            "url" => $request->url,
            "parent_id" => $request->parent_id,
            "order" => $request->order,
            "status" => $request->status
        ]);

        session()->put('update','MenuItem Link Successfully updated.');
        return redirect()->back();
    }





}


