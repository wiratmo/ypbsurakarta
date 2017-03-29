<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article;
use App\Model\Picture;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Category extends Model
{
	
	protected $dates = ['deleted_at'];

	public $timestamps = false;
	
    public function articles(){
    	return $this->belongsToMany(Article::class);
    }

    public function pictures(){
    	return $this->belongsToMany(Picture::class);
    }

    public function scopeGetAllCategoryAndCountArticle($query){
        return $query
            ->join('article_category', 'article_category.category_id', 'categories.id')
            ->join('articles', 'articles.id', 'article_category.article_id')
            ->select('categories.*', DB::raw('count(articles.id) as countArticle'))
            ->group('categories.id')
            ->get();
    }
}
