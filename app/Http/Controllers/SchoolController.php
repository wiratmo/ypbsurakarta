<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\School;
/*
* Storage for store file in server
*/
use Storage;
/*
* Image for modificated image file
*/
use Image;

class SchoolController extends Controller
{
        public function index(){
    	$data['schools'] = School::all();
    	return view('admin.school', $data);
    	return dd($data);
    }

    public function create(){
    	return view('admin.school_create');
    }
 
    public function store (Request $request){
    	
        if($request->hasFile('logo')){
        	$school = new School;
            $school->title = $request->title;
            $school->keyword = $request->keyword;
            $school->description = $request->description;
            $school->grade = $request->grade;
            $school->name = $request->name;
            $school->website = $request->website;
            $school->address = $request->address;
            $school->visions = $request->visions;
        	$school->missions = $request->missions;
            $school->logo = date('now').'-'.$request->file('logo')->getClientOriginalName();
            Storage::disk('logo')->put(date('now').'-'.$request->file('logo')->getClientOriginalName(), file_get_contents($request->file('logo'))); //store file in disk public
            // $file->getClientOriginalName(); //get original name with extension file
                if ($request->hasFile('picture')){
                    $school->picture = $request->file('picture')->getClientOriginalName();
                    Storage::disk('image')->put(date('now').'-'.$request->file('picture')->getClientOriginalName(), file_get_contents($request->file('picture'))); //store file in disk public
                    // $file->getClientOriginalName(); //get original name with extension file
                }
            $school->save();
        	$request->session()->flash('success', "terimakasih anda telah menambahkan School");
            return redirect('/admin/sekolah');
        }
        $request->session()->flash('denger', "terimakasih anda tidak memasukkan logo");
    	return redirect('/admin/sekolah');
    }

    public function edit ($id){
    	$data['id'] = $id;
    	$data['school'] = School::findOrFail($id);
        return view('admin.school_edit', $data);
    	return dd($data);
    }

    public function update(Request $request){
    	
            $school = School::find($request->id);
            $school->title = $request->title;
            $school->keyword = $request->keyword;
            $school->description = $request->description;
            $school->name = $request->name;
            $school->website = $request->website;
            $school->address = $request->address;
            $school->visions = $request->visions;
            $school->missions = $request->missions;
            if($request->hasFile('logo')){
            $school->logo = date('now').'-'.$request->file('logo')->getClientOriginalName();
            Storage::disk('logo')->put(date('now').'-'.$request->file('logo')->getClientOriginalName(), file_get_contents($request->file('logo'))); 
            }//store file in disk public
            // $file->getClientOriginalName(); //get original name with extension file
                if ($request->hasFile('picture')){
                    $school->picture = date('now').'-'.$request->file('picture')->getClientOriginalName();
                    Storage::disk('image')->put(date('now').'-'.$request->file('picture')->getClientOriginalName(), file_get_contents($request->file('picture'))); //store file in disk public
                    // $file->getClientOriginalName(); //get original name with extension file
                }
            $school->save();
            $request->session()->flash('success', "terimakasih anda telah menambahkan School");
            return redirect('/admin/sekolah');
    }

    public function delete(Request $request){
    	$school = School::find($request->id);
    	$school->delete();
    	$request->session()->flash('danger', "terimakasih sudah menghapus School");
    	return redirect('/admin/sekolah');
    }
}