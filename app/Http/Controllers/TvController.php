<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Youtube;

class TvController extends Controller
{	
    public function all(){
    	dd(Youtube::getVideoInfo('feBAQORDv3M'));
    }
}
