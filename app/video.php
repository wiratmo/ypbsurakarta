<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    public function user(){
    	return $this->belongsTo('\App\User');
    }

    public function videocategories(){
    	return $this->belongsToMany('\App\videocategory');
    }

    public function videotags(){
    	return $this->belongsToMany('\App\videotag');
    }
}
