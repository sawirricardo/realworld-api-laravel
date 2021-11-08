<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCommentResource;
use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

/**
 * @group Article's comments
 */
class ArticleCommentController extends Controller
{
    /**
     * Create a new comment on an article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'body' => ['required', 'string', 'min:3'],
        ]);

        return new ArticleCommentResource(
            $article->articleComments()->create([
                'body' => $request->input('body'),
                'user_id' => $request->user()->id,
            ])
        );
    }

    /**
     * Update user's comment on an article.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleComment $articleComment)
    {
        $request->validate([
            'body' => ['required', 'string', 'min:3']
        ]);

        $articleComment->update([
            'body' => $request->input('body'),
        ]);

        return new ArticleCommentResource($articleComment);
    }

    /**
     * Remove user's comment.
     *
     * @param  \App\Models\ArticleComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleComment $articleComment)
    {
        $articleComment->delete();
        return response()->noContent();
    }
}
