<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Category;
use App\Model\School;
use Auth;

class ArticleController extends Controller
{
    /*
    * Controller article in guest user
    * Just view
    */

    public function index($slug){
        $data['links'] = School::all();
    	$data['articles'] = Article::with(['categories','tags','user','comment'])->whereSlug($slug)->where('status', 1)->where('accept', 1)->get();
        $data['profile'] = Article::profile($slug);
        $article = Article::find($data['articles'][0]->id);
        $article->view = ($article->view) +1;
        $article->save();
        return view('dashboard.detail', $data);
    }

    public function all(){
        $data['links'] = School::all();
        $data['articles'] = Article::with(['categories','tags','user','comment'])->where('status', 1)->where('accept', 1)->paginate(5);
        $data['category'] = Category::take(10)->get();
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
        if($request->aksi == 'post'){
            $article->status = 1;
        } else if ($request->aksi == 'draff') {
            $article->status = 0;
        }
        $article->save();
        if($request->has('tag')){
            $article->tags()->sync($request->tag);
        }
        if($request->has('category')){
            $article->categories()->sync($request->category);
        }
        
        $request->session()->flash('success', 'anda telah menambahkan artikel baru terimakasih');
        return redirect('/contributor/article');
    }

    public function editContributor($id){
        $data['id']= $id;
        $data['articles'] = Article::with(['categories','tags','user'])->whereUser_id(Auth::user()->role)->whereId($id)->get();
        return view('admin.article_edit', $data);
        return $data;
    }

    Public function update(Request $request){
        $article = Article::find($request->id);
        $article->accept='0';
        $article->user_id = Auth::user()->id;
        if($request->has('tag')){
            $article->tags()->sync($request->tag);
        }
        if($request->has('category')){
            $article->categories()->sync($request->category);
        }
        $article->keyword = $request->keyword;
        $article->title = $request->title;
        $article->slug = str_slug($request->title);
        $article->description = $request->description;
        $article->content = $request->content;

        if($request->aksi == 'post'){
            $article->status = 1;
        } else if ($request->aksi == 'draff') {
            $article->status = 0;
        }
        $article->save();

        $request->session()->flash('success', 'anda telah merubah artikel terimakasih');
        if(Auth::user()->role === 1){
            return redirect('/contributor/article');
        } else if(Auth::user()->role === 2){
            return redirect('/admin/article');
        }
    }

    /*
    * Controller article in admin user
    * Just edit and delete
    */

    public function accept(Request $request){
        $article = Article::find($request->id);
        $article->accept=1;
        $article->save();
        $request->session()->flash('success', 'data artikel telah diaccept');
        return redirect('admin/article');
    }
    public function indexAdmin(){
        $data['articles'] = Article::with(['categories','tags','user','comment'])->get();
        return view('admin.article', $data);
    	return dd($data);
    }

    public function editAdmin($id){
        $data['id'] = $id;
        $data['articles'] = Article::with(['categories','tags','user','comment'])->whereId($id)->get();
        return view('admin.article_edit', $data);
        return $data;
    }
    
    public function delete(Request $request){
        $article = Article::find($request->id);
        $article->delete();
        $request->session()->flash('danger', 'data artikel telah dihapus');
        return redirect('admin/article');
    }
}
