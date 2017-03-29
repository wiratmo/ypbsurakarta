<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Tag;
use App\Model\Category;
use App\Model\School;
use App\Http\Requests\admin\TagRequest;
use App\Model\Picturecategory;
use Auth;

class TagController extends Controller
{

    public function index($tag){
        $data['links'] = School::all();
        $data['picturecategory'] = Picturecategory::all();
    	$data['articles'] = Article::with(['tags','categories','user','comment'])
    								->select('articles.*')
    								->join('article_tag','article_tag.article_id','articles.id')
    								->join('tags','tags.id','article_tag.tag_id')
    								->where('tags.slug',$tag)
                                    ->where('accept', 1)
    								->paginate(5);
        $data['category'] = Category::take(10)->get();
        return view('dashboard.article', $data);
    }

    public function indexTag(){
    	$data['tags'] = Tag::all();
        return view ('admin.tag', $data);
    }

    public function datajson(){
        $data['tags'] = Tag::Select('id', 'name as text')->get();
        return response()->json($data['tags']);
    }

    public function create(){
    	return view('admin.tag_create');
    }

    public function store (TagRequest $request){
        Tag::create([
            'name' => $request->name,
            'description' => $request->description,
            'keyword' => $request->keyword,
            'slug' => str_slug($request->name)
            ]);
        
        if(Auth::user()->role == 1){
            return redirect('/contributor/tag');
        } else if(Auth::user()->role == 2){
            return redirect('/admin/tag');
        }
    }
    public function edit ($id){
        $data['id'] = $id;
    	$data['tags'] = Tag::Where('id',$id)->get();
        return view('admin.tag_edit', $data);
    }

    public function update(TagRequest $request){
        Tag::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'keyword' => $request->keyword,
            'slug' => str_slug($request->name),
            ]);
        if(Auth::user()->role == 1){
            return redirect('/contributor/tag');
        } else if(Auth::user()->role == 2){
            return redirect('/admin/tag');
        }
    }

    public function delete(Request $request){
    	$tag = Tag::find($request->id);
        $tag->delete();
        $request->session()->flash('success', 'Tag telag dihapus');
        return redirect('admin/tag');
    }
}
