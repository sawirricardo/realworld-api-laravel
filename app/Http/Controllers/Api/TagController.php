<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagCollection;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

/**
 * @group Tags
 */
class TagController extends Controller
{
    /**
     * List all tags associated with articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TagCollection(Tag::all());
    }
}
