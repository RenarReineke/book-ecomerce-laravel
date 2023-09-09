<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RatingEnum;
use App\Models\Rewiew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rewiew\StoreRewiewRequest;
use App\Services\RewiewService;
use ReflectionClass;

class AdminRewiewResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rewiews = Rewiew::paginate(10);
        return view('admin.main.rewiews', compact('rewiews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $ratings = RatingEnum::class;
        $reflection = new ReflectionClass($ratings);
        $ratingList = $reflection->getConstants();
        return view('admin.main.rewiews.rewiewCreateForm', compact('ratingList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRewiewRequest $request, RewiewService $rewiewService)
    {
        $user = $request->user();
        $rewiew = $rewiewService->store($request->validated(), $user);
        return redirect()->route('rewiews.show', ['rewiew' => $rewiew]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rewiew $rewiew)
    {
        return view('admin.main.rewiews.rewiewDetail', compact('rewiew'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
