<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article;
use App\Model\Picture;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{

	protected $fillable = [
        'name', 'keyword', 'description', 'slug'
    ];

    protected $dates = ['deleted_at'];

    public $timestamps = false;
    

    public function articles(){
    	return $this->belongsToMany(Article::class);
    }

    public function pictures(){
    	return $this->belongsToMany(Picture::class);
    }
}
