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

class DashboardController extends Controller
{
    public function index(){
    	$data['agenda'] = Agenda::OrderBy('created_at','desc')->take(4)->get();
    	$data['new_article'] = Article::OrderBy('created_at', 'desc')->take(10)->get();
    	$data['slider'] = Picture::where('category',2)->get();
    	$data['most_view_article'] = Article::OrderBy('view','desc')->take(5)->get();
    	$data['fondation'] = Foundation::All();
    	$data['school'] = School::OrderBy('grade')->get();
    	$data['picture'] = Picture::OrderBy('created_at')->take(5)->get();

    	return view('dashboard.home', $data);
    	return dd($data);
    }
}
