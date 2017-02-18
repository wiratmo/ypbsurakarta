<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Picture;
class Picturecategory extends Model
{
    public function pictures(){
    	return $this->belongsToMany(Picture::class);
    }
}
