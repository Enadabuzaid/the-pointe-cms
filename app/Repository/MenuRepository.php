<?php

namespace App\Repository;

use App\Models\Menu;

class MenuRepository implements MenuRepositoryInterface
{

    public function getAllMenus(){
        return $menus = Menu::all();
    }

    public function storeMenus($request){
        $validated = $request->validate([
            'name' => 'required',
         ]);

        Menu::create([
            "name" => $request->name,
            "status" => $request->status,
         ]);

        session()->put('success','Menu Link Successfully Added.');
        return redirect()->back();
    }

    public function destroy($request){
        Menu::find($request->id)->delete();
        session()->put('delete','Menu Link Successfully deleted.');
        return redirect()->back();
    }

    public function switch($request){
        $menu = Menu::find($request->id);
        $menu->status = $request->type;
        $menu->save();
        session()->put('switch','Menu Link Successfully Switched.');
        return redirect()->back();
    }

    public function update($request){
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $menu = Menu::find($request->id);

        $menu->update([
            "name" => $request->name,
            "status" => $request->status
        ]);

        session()->put('update','Menu Link Successfully updated.');
        return redirect()->back();
    }





}


