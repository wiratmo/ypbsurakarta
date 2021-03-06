<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Foundation;
use App\Model\Article;
use App\Model\School;
use App\Model\Picturecategory;
/*
* Storage for store file in server
*/
use Storage;
/*
* Image for modificated image file
*/
use Image;
/*
* SEO
*/
use SEOMeta;

class FoundationController extends Controller
{
    public function __construct(){
        $data['fondation'] = Foundation::all();
        SEOMeta::setTitle($data['fondation'][0]->title);
        SEOMeta::setDescription($data['fondation'][0]->description);
        SEOMeta::addMeta('article:published_time', $data['fondation'][0]->created_at, 'property');
        SEOMeta::addKeyword([$data['fondation'][0]->keyword]);
    }

    public function index(){
    	$data['foundation'] = Foundation::all();
    	return view('admin.foundation', $data);
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
        $foundation->profil = $request->profil;
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

    public function profil(){
        $data['links'] = School::all();
        $data['picturecategory'] = Picturecategory::all();
        $data['foundation'] = Foundation::all();
        $data['foundation_article'] = Article::OrderBy('view', 'desc')->where('status',1)->where('accept',1)->take(10)->get();
        $data['new_article'] = Article::with('user')->OrderBy('created_at', 'desc')->where('status',1)->where('accept',1)->take(15)->get();
        return view('dashboard.profil',$data);
        return dd($data);
    }

    public function susunan(){
        $data['links'] = School::all();
        $data['picturecategory'] = Picturecategory::all();
        $data['foundation'] = Foundation::all();
        $data['foundation_article'] = Article::OrderBy('view', 'desc')->where('status',1)->where('accept',1)->take(10)->get();
        $data['new_article'] = Article::with('user')->OrderBy('created_at', 'desc')->where('status',1)->where('accept',1)->take(15)->get();
        return view('dashboard.susunan',$data);
           
    }
}
