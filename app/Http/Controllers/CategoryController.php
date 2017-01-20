<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index($category){
    	$data['articles'] = Article::with(['tags','categories','user','comment'])
    								->select('articles.*')
    								->join('article_category','article_category.article_id','articles.id')
    								->join('categories','categories.id','article_category.category_id')
    								->where('categories.slug',$category)
    								->get();
        $data['category'] = Category::all();
        return view('dashboard.article', $data);
    	return dd($data);
    }

    public function indexCategory(){
    	$data['categories'] = Category::all();
    	return dd($data);
    }

    public function create(){
    	return "create";
    }

    public function store (Request $request){
    	return dd($request->all());
    }

    public function edit ($id){
    	$data['categories'] = Category::Where('id',$id)->get();
    	return dd($data);
    }

    public function update(Request $request){
    	return dd($request->all());
    }

    public function delete(Request $request){
    	return dd($request->all());
    }
}
