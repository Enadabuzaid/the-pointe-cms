<?php

namespace App\Repository;

use App\Models\Slider;

class SliderRepository implements SliderRepositoryInterface
{

    public function getAllSliders(){
        return $sliders = Slider::all();
    }

    public function storeSliders($request){
        $validated = $request->validate([
            'title' => 'required',
         ]);

     
         Slider::create([
            "title" => $request->title,
            "css_class" => $request->css_class,
            "html_id" => $request->html_id,
            "status" => $request->status,
         ]);

        session()->put('success','Slider Link Successfully Added.');
        return redirect()->back();
    }


 

    public function destroy($request){
        Slider::find($request->id)->delete();
        session()->put('delete','Slider Link Successfully deleted.');
        return redirect()->back();
    }

    public function switch($request){
        $slider = Slider::find($request->id);
        $slider->status = $request->type;
        $slider->save();
        session()->put('switch','Slider Link Successfully Switched.');
        return redirect()->back();
    }

    public function update($request){
        $validated = $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);

        $slider = Slider::find($request->id);

        $slider->update([
            "title" => $request->title,
            "css_class" => $request->css_class,
            "html_id" => $request->html_id,
            "status" => $request->status,
        ]);

        session()->put('update','Slider Link Successfully updated.');
        return redirect()->back();
    }





}


