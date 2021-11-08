<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\ArticleFavorite;
use Illuminate\Http\Request;

/**
 * @group Favorite/Unfavorite an article
 */
class ArticleFavoriteController extends Controller
{
    /**
     * Favorite an article.
     *
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function store(Article $article)
    {
        $article->articleFavorites()->create([
            'user_id' => auth()->user()->id,
        ]);
        $article->load(['articleFavorites']);
        return new ArticleResource($article);
    }


    /**
     * Unfavorite an article.
     *
     * @param  \App\Models\ArticleFavorite  $articleFavorite
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function destroy(Article $article)
    {
        $article->articleFavorites()
            ->where('user_id', auth()->user()->id)
            ->delete();
        $article->load(['articleFavorites']);
        return new ArticleResource($article);
    }
}
