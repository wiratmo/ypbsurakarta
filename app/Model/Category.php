<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article;
use App\Model\Picture;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	public $timestamps = false;
	
    public function articles(){
    	return $this->belongsToMany(Article::class);
    }

    public function pictures(){
    	return $this->belongsToMany(Picture::class);
    }
}
