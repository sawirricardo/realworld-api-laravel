<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Models\Article;
use Illuminate\Http\Request;

/**
 * @group Articles
 */
class ArticleFeedController extends Controller
{
    /**
     * List article's feed.
     *
     * According to user's favorite author
     *
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function index()
    {
        return new ArticleCollection(
            Article::with(['user', 'tags'])
                ->withCount(['articleComments', 'articleFavorites'])
                ->whereRelation('articleFavorites', 'user_id', request()->user()->id)
                ->get()
        );
    }
}
