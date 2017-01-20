<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Picture;
/*
* Storage for store file in server
*/
use Storage;
/*
* Image for modificated image file
*/
use Image;

class PictureController extends Controller
{
    public function index ($slug){
    	$data['pictures'] = Picture::whereSlug($slug)->get();
    	return dd($data);
    }

    public function all(){
    	$data['pictures'] = Picture::all();
        return dd($data);
    }

    /*
    * Controller article in guest user
    * Just view create and edit 
    */

    public function indexContributor(){
        $data['pictures'] = Picture::paginate(16);
        return view('admin.picture', $data);
    	return dd($data);
    }

    public function createContributor(){
        return view('admin.picture_create');
    }

    public function storeContributor(Request $request){
        $picture = new Picture;
        $picture->title = $request->title;
        $picture->keyword = $request->keyword;
        $picture->description = $request->description;
        $picture->name = $request->name;
        $picture->category = '1';
        $picture->location = $request->file('picture')->getClientOriginalName();
        $picture->url = $request->url_picture;
        $picture->save();
        $img = Image::make($request->file('picture'))->resize(250, 250)->save('storage/image/small/'.date('now').'-'.$request->file('picture')->getClientOriginalName()); // resize image with image function
        Storage::disk('image')->put(date('now').'-'.$request->file('picture')->getClientOriginalName(), file_get_contents($request->file('picture'))); //store file in disk public
        // $file->getClientOriginalName(); //get original name with extension file
        return redirect('contributor/picture');
    }

    public function edit($id){
        $data['id'] = $id;
        $data['pictures'] = Picture::Where('id',$id)->get();
        return view('admin.picture_edit', $data);
    }

    Public function update(Request $request){
        $picture = Picture::find($request->id);
        $picture->title = $request->title;
        $picture->keyword = $request->keyword;
        $picture->description = $request->description;
        $picture->name = $request->name;
        $picture->category = '1';
        if($request->hasFile('picture')){
            $picture->location = date('now').'-'.$request->file('picture')->getClientOriginalName();
            $img = Image::make($request->file('picture'))->resize(250, 250)->save('storage/image/small/'.date('now').'-'.$request->file('picture')->getClientOriginalName()); // resize image with image function
            Storage::disk('image')->put(date('now').'-'.$request->file('picture')->getClientOriginalName(), file_get_contents($request->file('picture'))); //store file in disk public    
        }
        $picture->url = $request->url_picture;
        $picture->save();
        
        return redirect('contributor/picture');
    }

    /*
    * Controller article in admin user
    * Just edit and delete
    */

    public function delete(Request $request){
        return "delete";
    }
}
