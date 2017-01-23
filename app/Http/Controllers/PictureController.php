<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Picture;
use Auth;
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
    	$data['pictures'] = Picture::whereSlug($slug)->where('category',1)->get();
    	return dd($data);
    }

    public function all(){
    	$data['pictures'] = Picture::Where('category',1)->paginate(16);
        return dd($data);
    }

    /*
    * Controller article in guest user
    * Just view create and edit 
    */

    public function indexContributor(){
        $data['category'] = 1;
        $data['pictures'] = Picture::Where('category',1)->paginate(16);
        return view('admin.picture', $data);
    	return dd($data);
    }

    public function indexContributorSlider(){
        $data['category'] = 2;
        $data['pictures'] = Picture::Where('category',2)->paginate(16);
        return view('admin.picture', $data);
        return dd($data);
    }

    public function createContributor(){
        $data['category'] = 1;
        return view('admin.picture_create', $data);
    }

    public function createContributorSlider(){
        $data['category'] = 2;
        return view('admin.picture_create', $data);
    }

    public function storeContributor(Request $request){
        if($request->hasFile('picture')){
            $picture = new Picture;
            $picture->title = $request->title;
            $picture->keyword = $request->keyword;
            $picture->description = $request->description;
            $picture->name = $request->name;
            $picture->category = $request->category;
            $picture->location = $request->file('picture')->getClientOriginalName();
            $picture->url = $request->url_picture;
            $picture->save();
            $img = Image::make($request->file('picture'))->resize(250, 250)->save('storage/image/small/'.date('now').'-'.$request->file('picture')->getClientOriginalName()); // resize image with image function
            Storage::disk('image')->put(date('now').'-'.$request->file('picture')->getClientOriginalName(), file_get_contents($request->file('picture'))); //store file in disk public
            // $file->getClientOriginalName(); //get original name with extension file
        $request->session()->flash('success', "anda telah mengupload gambar baru");
            if($request->category == 1){
                return redirect('contributor/picture');
            }elseif ($request->category == 2) {
                return redirect('admin/slider');
            }
        }
        $request->session()->flash('danger', "anda tidak memasukkan gambar");
        if($request->category == 1){
            return redirect('contributor/picture');
        }elseif ($request->category == 2) {
            return redirect('admin/slider');
        }
    }

    public function edit($id){
        $data['id'] = $id;
        $data['category'] = 1;
        $data['pictures'] = Picture::Where('id',$id)->get();
        return view('admin.picture_edit', $data);
    }

    public function editslider($id){
        $data['id'] = $id;
        $data['category'] = 2;
        $data['pictures'] = Picture::Where('id',$id)->get();
        return view('admin.picture_edit', $data);
    }

    Public function update(Request $request){
        $picture = Picture::find($request->id);
        $picture->title = $request->title;
        $picture->keyword = $request->keyword;
        $picture->description = $request->description;
        $picture->name = $request->name;
        $picture->category = $request->category;
        if($request->hasFile('picture')){
            $picture->location = date('now').'-'.$request->file('picture')->getClientOriginalName();
            $img = Image::make($request->file('picture'))->resize(250, 250)->save('storage/image/small/'.date('now').'-'.$request->file('picture')->getClientOriginalName()); // resize image with image function
            Storage::disk('image')->put(date('now').'-'.$request->file('picture')->getClientOriginalName(), file_get_contents($request->file('picture'))); //store file in disk public    
        }
        $picture->url = $request->url_picture;
        $picture->save();
        if(Auth::user()->role === 1){
            return redirect('contributor/picture');
        } else if (Auth::user()->role ===2){
            if ($request->category == 2) {
                return redirect('admin/slider');
            }
            return redirect('admin/picture');
        }
    }

    /*
    * Controller article in admin user
    * Just edit and delete
    */

    public function delete(Request $request){
        $picture = Picture::find($request->id);
        Storage::delete('image/'.$picture->location);
        $picture->delete();

        $request->session()->flash('danger', "gambar anda telah dihapus");
        if ($picture->category == 2) {
            return redirect('admin/slider');
        }
        return redirect('admin/picture');
    }
}
