<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articles;
use App\Http\Requests\CreateArticlesRequest;
use Carbon\Carbon;
class ArticlesController extends Controller
{
    public function index() 
    {
        // Use the latest method, not lasted!!!!
    	$articles = Articles::latest('published_at')->unpublished()->get();
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

    public function store(CreateArticlesRequest $request)
    {
        Articles::create($request->all());

        return redirect('articles');
    }


}
