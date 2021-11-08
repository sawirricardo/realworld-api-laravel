<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Article extends Model
{
    use HasFactory;
    use HasTags;
    use Sluggable;

    protected $guarded = [];

    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articleComments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function articleFavorites()
    {
        return $this->hasMany(ArticleFavorite::class);
    }
}
