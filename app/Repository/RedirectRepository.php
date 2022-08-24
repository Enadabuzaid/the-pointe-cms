<?php

namespace App\Repository;

use App\Models\Redirect;

class RedirectRepository implements RedirectRepositoryInterface
{

    public function getAllRedirects(){
        return $redirects = Redirect::all();
    }

    public function storeRedirects($request){
        $validated = $request->validate([
            'from_link' => 'required',
            'to_link' => 'required',
        ]);

        Redirect::create([
            "url_from" => $request->from_link,
            "url_to" => $request->to_link,
            "type" => $request->type_link
        ]);

        session()->put('success','Redirect Link Successfully Added.');
        return redirect()->back();
    }

    public function destroy($request){
        Redirect::find($request->id)->delete();
        session()->put('delete','Redirect Link Successfully deleted.');
        return redirect()->back();
    }

    public function switch($request){
        $redirect = Redirect::find($request->id);
        $redirect->status = $request->type;
        $redirect->save();
        session()->put('switch','Redirect Link Successfully Switched.');
        return redirect()->back();
    }

    public function update($request){
        $validated = $request->validate([
            'from_link' => 'required',
            'to_link' => 'required',
        ]);

        $redirect = Redirect::find($request->id);

        $redirect->update([
            "url_from" => $request->from_link,
            "url_to" => $request->to_link,
            "type" => $request->type_link,
            "status" => $request->status
        ]);

        session()->put('update','Redirect Link Successfully updated.');
        return redirect()->back();
    }





}


