<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Tag;
use App\Model\Category;

class TagController extends Controller
{
    public function index($tag){
    	$data['articles'] = Article::with(['tags','categories','user','comment'])
    								->select('articles.*')
    								->join('article_tag','article_tag.article_id','articles.id')
    								->join('tags','tags.id','article_tag.tag_id')
    								->where('tags.slug',$tag)
    								->get();
        $data['category'] = Category::all();
        return view('dashboard.article', $data);
    	return dd($data);
    }

    public function indexTag(){
    	$data['tags'] = Tag::all();
    	return dd($data);
    }

    public function create(){
    	return "create";
    }

    public function store (Request $request){
    	return dd($request->all());
    }

    public function edit ($id){
    	$data['tags'] = Tag::Where('id',$id)->get();
    	return dd($data);
    }

    public function update(Request $request){
    	return dd($request->all());
    }

    public function delete(Request $request){
    	return dd($request->all());
    }
}
