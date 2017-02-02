<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class videocategory extends Model
{
    public function videos(){
    	return $this->belongsToMany('\App\video');
    }
}
