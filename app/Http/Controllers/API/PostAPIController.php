<?php

namespace App\Http\Controllers\API;

use App\Events\NewPostCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewPost;
use App\Http\Resources\PostResource;
use App\Listeners\SendMailWhenPostIsCreated;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Website         $website
     * @param  \App\Http\Requests\NewPost  $request
     *
     * @return \App\Http\Resources\PostResource
     */
    public function store(Website $website, NewPost $request): PostResource
    {

        $validated = $request->validated();

        $newCreatedPost = Post::create($validated);

        event(new NewPostCreated($newCreatedPost, $website));

        return new PostResource($newCreatedPost);
    }
}
