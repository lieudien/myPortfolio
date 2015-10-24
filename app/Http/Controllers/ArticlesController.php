<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Http\Requests\ArticlesRequest;
use App\Tag;
use Carbon\Carbon;
use Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Construct an article controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

    	return view('articles.index', compact("articles", "loginData"));
    }

    /**
     * Show the article details.
     *
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {
    	return view('articles.show', compact('article'));
    }

    /**
     * Show the create article view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name','id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Save the article.
     *
     * @param ArticlesRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticlesRequest $request)
    {
        $this->createArticle($request);
        flash()->success("Your articles is successfully created!");

        return redirect('articles');
    }

    /**
     * Edit article from the authorized user.
     *
     * @param Article $article
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id != $article->user_id)
            return response('Unauthorized', 401);
        $tags = Tag::lists('name','id');
        return view('articles.edit', compact('article','tags'));
    }

    /**
     * Post request to update the article.
     *
     * @param Article $article
     * @param ArticlesRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticlesRequest $request)
    {
        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        flash()->success("Your articles is successfully edited", "Thank you");
        return redirect('articles');
    }

    private function syncTags(Article $article, array $tag_list)
    {
        $article->tags()->sync($tag_list);
    }

    private function createArticle(ArticlesRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
