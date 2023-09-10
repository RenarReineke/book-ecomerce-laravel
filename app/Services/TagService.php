<?php

namespace App\Services;

use App\Models\Tag;

final class TagService
{
    public function store(array $request): Tag
    {
        return Tag::create($request); 
    }

    public function update(array $request, Tag $tag): Tag
    {
        $tag->update($request);
        return $tag;
    }
}