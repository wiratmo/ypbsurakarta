<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\video;
use App\videocategory;
use App\Model\School;
use Carbon\Carbon;

class VideoController extends Controller
{
    
    public function index(){
    	$data['links'] = School::all();
        $data['categories'] = videocategory::all();
        $data['videos'] = video::with('user')->paginate(9);
        return view('video.home', $data);
    }

    public function slug($slug){
        $id = video::where('slug',$slug)->get();
        $category = video::find($id[0]->id)->videocategories->take(1)[0]->id;
        video::where('slug',$slug)->update(['dateView'=> Carbon::now()]);
        $data['categories'] = videocategory::all();
        $data['lastplay'] = video::whereId($id[0]->id)->with('videotags')->get()[0];
        $data['videos'] = videocategory::find($category)->videos;
        return view('video.detail', $data);
        return dd($data);
    }

    public function category($slug){
        $data['categories'] = videocategory::all();
        $data['videos'] = video::with('videocategories')
            ->select('videos.*')
            ->join('video_videocategory', 'video_videocategory.video_id', 'videos.id')
            ->join('videocategories', 'videocategories.id', 'video_videocategory.videocategory_id')
            ->where('videocategories.slug', $slug)
            ->get();
        $data['lastplay'] = video::with('videocategories', 'videotags')
            ->select('videos.*')
            ->join('video_videocategory', 'video_videocategory.video_id', 'videos.id')
            ->join('videocategories', 'videocategories.id', 'video_videocategory.videocategory_id')
            ->where('videocategories.slug', $slug)
            ->orderBy('videos.dateView', 'desc')
            ->take(1)
            ->get()[0];
        return view('video.detail', $data);
        return dd($data);
    }

    public function tag($slug){
        $data['categories'] = videocategory::all();
        $data['videos'] = video::with('videotags')
            ->select('videos.*')
            ->join('video_videotag', 'video_videotag.video_id', 'videos.id')
            ->join('videotags', 'videotags.id', 'video_videotag.videotag_id')
            ->where('videotags.slug', $slug)
            ->get();
        $data['lastplay'] = video::with('videotags')
            ->select('videos.*')
            ->join('video_videotag', 'video_videotag.video_id', 'videos.id')
            ->join('videotags', 'videotags.id', 'video_videotag.videotag_id')
            ->where('videotags.slug', $slug)
            ->orderBy('videos.dateView', 'desc')
            ->take(1)
            ->get()[0];
        return view('video.detail', $data);
        return dd($data);
    }
}