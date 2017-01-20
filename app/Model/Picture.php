<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\Tag;

class Picture extends Model
{
    public function categories(){
    	return $this->belongsToMany(Category::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }    
}
