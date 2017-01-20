<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article;
use App\Model\Picture;


class Tag extends Model
{
    public function articles(){
    	return $this->belongsToMany(Article::class);
    }

    public function pictures(){
    	return $this->belongsToMany(Picture::class);
    }
}
