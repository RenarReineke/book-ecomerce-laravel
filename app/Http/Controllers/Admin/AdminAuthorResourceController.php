<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;

class AdminAuthorResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('admin.main.authors.authorList', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.main.authors.authorCreateForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request, AuthorService $authorService)
    {   
        $author = $authorService->store($request->validated());
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('admin.main.authors.authorDetail', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('admin.main.authors.authorUpdateForm', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author, AuthorService $authorService)
    {
        $author = $authorService->update($request->validated(), $author);
        return redirect()->route('authors.index', compact('author'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return back();
    }
}
