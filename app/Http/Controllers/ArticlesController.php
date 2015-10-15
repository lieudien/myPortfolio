<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articles;
use Carbon\Carbon;
use Request;

class ArticlesController extends Controller
{
    public function index() 
    {
        // Use the latest method, not lasted!!!!
    	$articles = Articles::unpublished()->get();
    	return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
    	$article = Articles::findOrNew($id);
    	return view('articles.show', compact('article'));
    }

    /**
     * Return create view
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        Articles::create(Request::all());

        return redirect('articles');
    }


}
