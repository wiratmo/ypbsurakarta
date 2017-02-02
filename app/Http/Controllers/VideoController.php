<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\video;
use App\Model\School;

class VideoController extends Controller
{
    
    public function index(){
    	$data['links'] = School::all();
    	$data['videos'] = video::paginate(9);
    	return view('video.home', $data);
    	
    }

    public function slug($slug){
    	$id = video::where('slug',$slug)->get();
    	$data['links'] = School::all();
    	$data['video'] = video::find($id[0]->id);
    	return view('video.detail', $data);
    	return dd($data);
    }
}
