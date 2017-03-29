<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Agenda;
use App\Model\Article;
use App\Model\Category;
use App\Model\Tag;
use App\Model\Foundation;
use App\Model\Picture;
use App\Model\School;
use App\Model\Picturecategory;
use Auth;
/*
* Storage for store file in server
*/
use Storage;
/*
* Image for modificated image file
*/
use Image;
/*
* Seo
*/
use SEOMeta;

class DashboardController extends Controller
{
    
    public function index(){
        $data['links'] = School::all();
    	$data['agenda'] = Agenda::OrderBy('implementation','asc')->take(4)->get();
        $data['picturecategory'] = Picturecategory::all();
    	$data['new_article'] = Article::OrderBy('created_at', 'desc')->where('status',1)->where('accept',1)->take(10)->get();
    	$data['slider'] = Picture::where('category',2)->where('accept', 1)->get();
    	$data['most_view_article'] = Article::with('user')->OrderBy('view','desc')->where('status',1)->where('accept',1)->take(4)->get();
    	$data['fondation'] = Foundation::All();
    	$data['school'] = School::OrderBy('grade')->get();
    	$data['picture'] = Picture::OrderBy('created_at')->where('category',1)->where('accept',1)->take(6)->get();

        /*Seo*/
            SEOMeta::setTitle($data['fondation'][0]->title);
            SEOMeta::setDescription($data['fondation'][0]->description);
            SEOMeta::addMeta('article:published_time', $data['fondation'][0]->created_at, 'property');
            SEOMeta::addKeyword([$data['fondation'][0]->keyword]);
        /*end Seo*/
    	return view('dashboard.home', $data);
    	return dd($data);
    }

    public function storeimage(Request $request){
        Storage::disk('image')->put(date('now').'-'.$request->file('file')->getClientOriginalName(), file_get_contents($request->file('file'))); 
        return $request->all();
    }

    public function upload(Request $request){
        if(empty($request->file('file'))){
            exit();
        }
        Storage::disk('image')->put('/article/'.date('now').'-'.$request->file('file')->getClientOriginalName(), file_get_contents($request->file('file'))); 
        return '/storage/image/article/'.date('now').'-'.$request->file('picture')->getClientOriginalName();
    }
}
