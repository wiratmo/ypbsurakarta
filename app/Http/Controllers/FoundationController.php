<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Foundation;
/*
* Storage for store file in server
*/
use Storage;
/*
* Image for modificated image file
*/
use Image;

class FoundationController extends Controller
{
    public function index(){
    	$data['foundation'] = Foundation::all();
    	return view('admin.foundation', $data);
    	return dd($data);
    }

    public function update(Request $request){
        /*return dd($request->all());*/
    	if(Foundation::count() == 1){
    		$foundation = Foundation::find(1);
    	} else {
    		$foundation = new Foundation;
    	}
    	$foundation->title = $request->title;
    	$foundation->keyword = $request->keyword;
    	$foundation->founder = $request->founder;
    	$foundation->description = $request->description;
    	$foundation->motto = $request->motto;
    	$foundation->visions = $request->visions;
    	$foundation->missions = $request->missions;
        if($request->hasFile('founder_image')){
            $foundation->founder_image = date('now').'-'.$request->file('founder_image')->getClientOriginalName();
            Storage::disk('logo')->put(date('now').'-'.$request->file('founder_image')->getClientOriginalName(), file_get_contents($request->file('founder_image'))); //store file in disk public   
        } 
        if($request->hasFile('logo')){
            $foundation->logo_location = date('now').'-'.$request->file('logo')->getClientOriginalName();
            Image::make($request->file('logo'))->resize(50, 50)->save('storage/image/small/'.date('now').'-'.$request->file('logo')->getClientOriginalName()); // resize image with image function
            Storage::disk('logo')->put(date('now').'-'.$request->file('logo')->getClientOriginalName(), file_get_contents($request->file('logo'))); //store file in disk public   
        } 
    	
    	$foundation->save();
    	$request->session()->flash('success', "anda telah merubah data yayasan");
    	return redirect('/admin/yayasan');
    	
    }

    
}
