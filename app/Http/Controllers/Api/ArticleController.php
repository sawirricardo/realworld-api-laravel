<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @group Articles
 */
class ArticleController extends Controller
{
    /**
     * List Articles.
     *
     * Returns most recent articles globally by default, provide tag, author or favorited query parameter to filter results
     *
     * @queryParam tag string Filter by tag
     * @queryParam author string Filter by author
     * @apiResourceModel \App\Http\Resources\ArticleCollection
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ArticleCollection(QueryBuilder::for(Article::class)
            ->with(['user', 'tags'])
            ->withCount(['articleComments', 'articleFavorites'])
            ->allowedSorts(['title', 'created_at'])
            ->allowedFilters(['title', 'created_at', 'user'])
            ->get());
    }

    /**
     * Create an Article
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['sometimes'],
            'body' => ['required', 'string'],
            'tags' => ['sometimes', 'array']
        ]);

        return new ArticleResource(Article::create([
            'user_id' => request()->user()->id,
            'title' => request('title'),
            'description' => request('description'),
            'body' => request('body'),
        ]));
    }

    /**
     * Get an Article
     *
     * @urlParam slug string The slug of the article.
     * @param  \App\Models\Article  $article
     * @apiResourceModel \App\Http\Resources\ArticleResource
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->load(['articleComments', 'user', 'tags']);
        return new ArticleResource($article);
    }

    /**
     * Update an article.
     *
     * @apiResourceModel \App\Http\Resources\ArticleResource
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['sometimes', 'string'],
            'description' => ['sometimes'],
            'body' => ['sometimes', 'string'],
            'tags' => ['sometimes', 'array']
        ]);

        $article->update($request->only(['title', 'description', 'body']));
        $article->syncTags(request('tags'));
        $article->load(['user', 'tags']);
        return new ArticleResource($article);
    }

    /**
     * Delete an article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->noContent();
    }
}
