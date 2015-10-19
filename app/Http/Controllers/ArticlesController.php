<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articles;
use App\Http\Requests\ArticlesRequest;
use Carbon\Carbon;
use Request;
use Illuminate\Support\Facades\Auth;
class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
    public function index() 
    {
        $articles = Articles::all();
    	return view('articles.index', compact('articles'));
    }

    public function show(Articles $article)
    {
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

    /**
     * @param ArticlesRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticlesRequest $request)
    {
        $article = new Articles($request->all());
        Auth::user()->articles()->save($article);

        return redirect('articles');
    }

    public function edit(Articles $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Articles $article, ArticlesRequest $request)
    {
        $article->update($request->all());

        return redirect('articles');
    }
}
