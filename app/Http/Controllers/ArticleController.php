<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use Auth;

class ArticleController extends Controller
{
    /*
    * Controller article in guest user
    * Just view
    */

    public function index($slug){
    	$data['articles'] = Article::with(['categories','tags','user','comment'])->whereSlug($slug)->get();
        $data['profile'] = Article::profile($slug);
        return view('dashboard.detail', $data);
        return dd($data);
    }

    public function all(){
        $data['articles'] = Article::with(['categories','tags','user','comment'])->paginate(5);
        $data['category'] = Category::all();
        return view('dashboard.article', $data);
        return dd($data);
    }

    /*
    * Controller article in guest user
    * Just view create and edit 
    */

    public function indexContributor(){
        $data['articles'] = Article::with(['categories','tags','user','comment'])->whereUser_id(Auth::user()->role)->get();
        return view('admin.article', $data);
        return dd($data);
    }

    public function createContributor(){
        return view('admin.article_create');
    }

    public function storeContributor(Request $request){
        $article = new Article;
        $article->user_id = Auth::user()->id;
        $article->keyword = $request->keyword;
        $article->title = $request->title;
        $article->slug = str_slug($request->title);
        $article->description = $request->description;
        $article->content = $request->content;
        $article->save();
        
        $request->session()->flash('success', 'anda telah menambahkan artikel baru terimakasih');
        return redirect('/contributor/article');
        return dd($request->all());
    }

    public function editContributor($id){
        $data['id']= $id;
        $data['articles'] = Article::with(['categories','tags','user'])->whereUser_id(Auth::user()->role)->whereId($id)->get();
        return view('admin.article_edit', $data);
        return $data;
    }

    Public function updateContributor(Request $request){
        $article = Article::find($request->id);
        $article->user_id = Auth::user()->id;
        $article->keyword = $request->keyword;
        $article->title = $request->title;
        $article->slug = str_slug($request->title);
        $article->description = $request->description;
        $article->content = $request->content;
        $article->save();

        $request->session()->flash('success', 'anda telah merubah artikel terimakasih');
        return redirect('/contributor/article');
        return dd($request->all());
    }

    /*
    * Controller article in admin user
    * Just edit and delete
    */
    public function indexAdmin(){
        $data['articles'] = Article::with(['categories','tags','user','comment'])->get();
    	return dd($data);
    }

    public function editAdmin($id){
        $data['articles'] = Article::with(['categories','tags','user','comment'])->whereId($id)->get();
        return dd($data);
    }

    Public function updateAdmin(Request $request){
        return dd($request->all());
    }
    public function delete(Request $request){
        return "delete";
    }
}
