<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Article
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $body
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ArticleComment[] $articleComments
 * @property-read int|null $article_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ArticleFavorite[] $articleFavorites
 * @property-read int|null $article_favorites_count
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ArticleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Article findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Article withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Article withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Article withAnyTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Article withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ArticleComment
 *
 * @property int $id
 * @property string $body
 * @property int $user_id
 * @property int $article_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Article $article
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleComment whereUserId($value)
 */
	class ArticleComment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ArticleFavorite
 *
 * @property int $id
 * @property int $article_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Article $article
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleFavorite whereUserId($value)
 */
	class ArticleFavorite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $bio
 * @property string|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ArticleComment[] $articleComments
 * @property-read int|null $article_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserFollower[] $userFollowers
 * @property-read int|null $user_followers_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserFollower
 *
 * @property int $id
 * @property int $followed_by_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $followedBy
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower whereFollowedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollower whereUserId($value)
 */
	class UserFollower extends \Eloquent {}
}

