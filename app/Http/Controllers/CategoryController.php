<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use App\Model\School;
use App\Model\Picturecategory;
use Auth;

class CategoryController extends Controller
{
    public function index($category){
        $data['links'] = School::all();
        $data['picturecategory'] = Picturecategory::all();
    	$data['articles'] = Article::with(['tags','categories','user','comment'])
    								->select('articles.*')
    								->join('article_category','article_category.article_id','articles.id')
    								->join('categories','categories.id','article_category.category_id')
    								->where('categories.slug',$category)
                                    ->where('accept', 1)
    								->paginate(5);
            $data['archived'] = Article::selectRaw('year(created_at) year, monthname(created_at) month, count(*) count')
                                ->groupBy('year','month')
                                ->orderBy('created_at','desc')
                                ->get();
        if($month = Request('month')){
            $data['articles']->whereMonth('created_at', Carbon::parse($month)->month);
        }if($year = Request('year')){
            $data['articles']->whereYear('created_at', $year);
        }
        $data['category'] = Category::take(10)->get();
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
        $category->keyword = $request->keyword;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->description= $request->description;
        $category->save();

        if(Auth::user()->role == 1){
            return redirect('contributor/category');
        } else if(Auth::user()->role ==2){
            return redirect('admin/category');

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
        $category->keyword = $request->keyword;
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->description= $request->description;
        $category->save();

        if(Auth::user()->role == 1){
            return redirect('contributor/category');
        } else if(Auth::user()->role == 2){
            return redirect('admin/category');

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
