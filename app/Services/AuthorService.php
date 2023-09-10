<?php

namespace App\Services;

use App\Models\Author;

final class AuthorService
{
    public function store(array $request): Author
    {
        return Author::create($request); 
    }

    public function update(array $request, Author $author): Author
    {
        $author->update($request);
        return $author;
    }
}