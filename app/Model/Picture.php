<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Picturecategory;
use App\Model\Tag;

class Picture extends Model
{
    public function picturecategories(){
    	return $this->belongsToMany(Picturecategory::class);
    }
}
