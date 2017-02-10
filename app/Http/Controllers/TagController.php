<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Tag;
use App\Model\Category;
use App\Model\School;

class TagController extends Controller
{

    public function index($tag){
        $data['links'] = School::all();
    	$data['articles'] = Article::with(['tags','categories','user','comment'])
    								->select('articles.*')
    								->join('article_tag','article_tag.article_id','articles.id')
    								->join('tags','tags.id','article_tag.tag_id')
    								->where('tags.slug',$tag)
    								->paginate(5);
        $data['category'] = Category::take(10)->get();
        return view('dashboard.article', $data);
    	return dd($data);
    }

    public function indexTag(){
    	$data['tags'] = Tag::all();
        return view ('admin.tag', $data);
    	return dd($data);
    }

    public function datajson(){
        $data['tags'] = Tag::Select('id', 'name as text')->get();
        return response()->json($data['tags']);
    }

    public function create(){
    	return view('admin.tag_create');
    }

    public function store (Request $request){
    	return dd($request->all());
    }

    public function edit ($id){
        $data['id'] = $id;
    	$data['tags'] = Tag::Where('id',$id)->get();
        return view('admin.tag_edit', $data);
    	return dd($data);
    }

    public function update(Request $request){
        
    }

    public function delete(Request $request){
    	$tag = Tag::find($request->id);
        $tag->delete();
        $request->session()->flash('success', 'Tag telag dihapus');
        return redirect('admin/tag');
    }
}
