<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'posts' => PostResource::collection($this->posts),
            'subscriptions' => SubscribedUserResource::collection($this->subscriptions),
        ];
    }
}
