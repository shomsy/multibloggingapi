<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeUser;
use App\Http\Resources\SubscribedUserResource;
use App\Http\Resources\WebsiteCollection;
use App\Http\Resources\WebsiteResource;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WebsiteAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\WebsiteCollection
     */
    public function index(): WebsiteCollection
    {
        $websites = Website::with(['posts', 'subscriptions'])->get();

        return  new WebsiteCollection($websites);
    }

    public function subscribeUser(Website $website, SubscribeUser $request): SubscribedUserResource
    {
        $validated = $request->validated();

        $subscription = $website->subscriptions()->create($validated);

        $user = User::where('email', $validated['email'])->first();

        return new SubscribedUserResource($user);
    }
}
