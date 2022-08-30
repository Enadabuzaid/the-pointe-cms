<?php

namespace App\Repository;

use App\Models\Slider;
use App\Models\Slide;

class SlideRepository implements SlideRepositoryInterface
{


    public function getSliderInfo($id){
        return $menuitems = Slider::find($id);
    }

    public function getAllSlides(){
        return $slides = Slide::all();
    }
 
    public function storeSlides($request){
        $validated = $request->validate([
            'title' => 'required',
            'slider_id' => 'required',
            'image_dt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_mb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  
         ]);
     
         $image_dt_name = time().'_'.$request->image_dt->getClientOriginalName();  
         $image_mb_name = time().'_'.$request->image_mb->getClientOriginalName();  

         $request->image_dt->move(public_path('images/slider'), $image_dt_name);
         $request->image_mb->move(public_path('images/slider'), $image_mb_name);
         

     
         Slide::create([
            "slider_id" => $request->slider_id,
            "title" => $request->title,
            "description" => $request->description,
            "image_dt" =>$image_dt_name,
            "image_mb" =>$image_mb_name,
            "url" => $request->url,
            "active_date" => $request->active_date,
            "order" => $request->order,
            "status" => $request->status,
         ]);

        session()->put('success','Slide Link Successfully Added.');
        return redirect()->back();
    }






    
    public function destroy($request){
        Slide::find($request->id)->delete();
        session()->put('delete','Slide Link Successfully deleted.');
        return redirect()->back();
    }

    public function switch($request){
        $slide = Slide::find($request->id);
        $slide->status = $request->type;
        $slide->save();
        session()->put('switch','Slide Link Successfully Switched.');
        return redirect()->back();
    }

    public function update($request){
        $validated = $request->validate([
            'title' => 'required',
            'slider_id' => 'required',
 
        ]);

        $slide = Slide::find($request->id);
        if ($request->hasFile('image_dt')) {
            $image_dt_name = time().'_'.$request->image_dt->getClientOriginalName();
            $request->image_dt->move(public_path('images/slider'), $image_dt_name);
            }
        else{  $image_dt_name=  $request->image_dt_old; }

 
        if ($request->hasFile('image_mb')) {
            $image_mb_name = time().'_'.$request->image_mb->getClientOriginalName();  
            $request->image_mb->move(public_path('images/slider'), $image_mb_name);
            }
        else{  $image_mb_name=  $request->image_mb_old; }
         
        $slide->update([
            "slider_id" => $request->slider_id,
            "title" => $request->title,
            "description" => $request->description,
            "image_dt" =>$image_dt_name,
            "image_mb" =>$image_mb_name,
            "url" => $request->url,
            "active_date" => $request->active_date,
            "order" => $request->order,
            "status" => $request->status,
        ]);

        session()->put('update','Slide Link Successfully updated.');
        return redirect()->back();
    }





}


