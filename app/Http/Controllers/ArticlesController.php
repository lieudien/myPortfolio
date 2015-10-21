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
        $articles = Articles::latest()->get();
        $loginData = array();
        if (Auth::user())
        {
            $loginData['loginText'] = "Log out";
            $loginData['url'] = '/auth/logout';
        } else
        {
            $loginData['loginText'] = "Log in";
            $loginData['url'] = 'auth/login';
        }
    	return view('articles.index', compact("articles", "loginData"));
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
        Auth::user()->articles()->create($request->all());

        flash()->success("Your articles is successfully created!");
        return redirect('articles');
    }

    public function edit(Articles $article)
    {
        if (Auth::user()->id != $article->user_id)
            return response('Unauthorized', 401);
        return view('articles.edit', compact('article'));
    }

    public function update(Articles $article, ArticlesRequest $request)
    {
        $article->update($request->all());
        flash()->success("Your articles is successfully edited", "Thank you");
        return redirect('articles');
    }
}
