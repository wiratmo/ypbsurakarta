<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Picture;
class Picturecategory extends Model
{
	protected $fillable = [
		'name','slug','keyword','description',
	];
	public $timestamps = false;
	
    public function pictures(){
    	return $this->belongsToMany(Picture::class);
    }
}
