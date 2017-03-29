<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Picturecategory;
use App\Http\Requests\admin\PicCatRequest;
use Auth;

class PictureCategoryController extends Controller
{
    public function index(){
    	$data['picturecategories'] = Picturecategory::all();
    	return view('admin.picturecategory', $data);
    }

    public function create(){
    	return view('admin.picturecategory_create');
    }

    public function store(PicCatRequest $request){
    	Picturecategory::create([
    		'name' => $request->name,
    		'slug' => str_slug($request->name),
    		'description' => $request->description,
    		'keyword' => $request->keyword,
    		]);
    	$request->session()->flash('success',"Selamat Sudah Menambahkan Kategori Gambar");
    	if(Auth::user()->role == 1){
    		return redirect('/contributor/picturecategory');
    	} else if(Auth::user()->role == 2){
    		return redirect('/admin/picturecategory');
    	}
    }

    public function edit($id){
    	$data['id'] = $id;
    	$data['picturecategory'] = Picturecategory::find($id);
    	return view('admin.picturecategory_edit', $data);
    }

    public function update(PicCatRequest $request){
    	Picturecategory::where('id', $request->id)
    			->update([
    				'name' => $request->name,
		    		'slug' => str_slug($request->name),
		    		'description' => $request->description,
		    		'keyword' => $request->keyword,
    				]);
    	$request->session()->flash('success',"Selamat Sudah Menambahkan Kategori Gambar");
    	if(Auth::user()->role == 1){
    		return redirect('/contributor/picturecategory');
    	} else if(Auth::user()->role == 2){
    		return redirect('/admin/picturecategory');
    	}
    }

    public function delete(Request $request){
    	$category = Picturecategory::find($request->id);
        $category->delete();
        $request->session()->flash('danger', 'Catagory telag dihapus');
        return redirect('admin/picturecategory');
    }
}
