<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use App\Model\School;

class CategoryController extends Controller
{
    public function index($category){
        $data['links'] = School::all();
    	$data['articles'] = Article::with(['tags','categories','user','comment'])
    								->select('articles.*')
    								->join('article_category','article_category.article_id','articles.id')
    								->join('categories','categories.id','article_category.category_id')
    								->where('categories.slug',$category)
    								->paginate(5);
        $data['category'] = Category::all();
        return view('dashboard.article', $data);
    	return dd($data);
    }

    public function indexCategory(){
    	$data['categories'] = Category::all();
        return view('admin.category', $data);
    	return dd($data);
    }

    public function datajson(){
        $data['categories'] = Category::Select('id', 'name as text')->get();
        return response()->json($data['categories']);
    }

    public function create(){
    	return view('admin.category_create');
    }

    public function store (Request $request){
        $category = new Category;
        $category->title = $request->title;
        $category->keyword = $request->keyword;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->description= $request->description;
        $category->save();

        if(Auth::user()->role === 1){
            return redirect('contributor/article');
        } else if(Auth::user()->role ===2){
            return redirect('admin/article');

        }
    }

    public function edit ($id){
        $data['id'] = $id;
    	$data['categories'] = Category::Where('id',$id)->get();
        return view('admin.category_edit', $data);
    	return dd($data);
    }

    public function update(Request $request){
    	$category = Category::find($request->id);
        $category->title = $request->title;
        $category->keyword = $request->keyword;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->description= $request->description;
        $category->save();

        if(Auth::user()->role === 1){
            return redirect('contributor/article');
        } else if(Auth::user()->role ===2){
            return redirect('admin/article');

        }
    }

    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        $request->session()->flash('danger', 'Catagory telag dihapus');
        return redirect('admin/category');
    	return dd($request->all());
    }
}
