<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\Tag;
use App\Model\UserProfile;
use App\User;
use App\Model\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public function categories(){
    	return $this->belongsToMany(Category::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function comment(){
    	return $this->hasMany(Comment::class)->join('users','users.id','comments.user_id');
    }

    public function scopeProfile($query, $slug){
        return $query
                    ->join('user_profiles','user_profiles.user_id','articles.user_id')
                    ->where('articles.slug',$slug)
                    ->select('user_profiles.*')
                    ->get();
    }
}
