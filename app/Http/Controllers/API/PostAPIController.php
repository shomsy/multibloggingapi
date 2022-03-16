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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
