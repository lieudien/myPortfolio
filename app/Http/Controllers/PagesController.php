<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    public function about() 
    {    	
    	$first = 'Danny';
    	return view('pages.about', compact('first'));
    }

    public function contact() 
    {
    	//$people = [];
    	$people = [ 'John Smith', 'Taylor Swift', 'Davi Jones'];
    	return view('pages.contact', compact('people'));
    }
}
