<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WebsiteCollection extends ResourceCollection
{
    public static $wrap = 'websites';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function toArray($request): AnonymousResourceCollection
    {
        return WebsiteResource::collection($this->collection);
    }
}
