<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RatingEnum;
use App\Models\Rewiew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rewiew\StoreRewiewRequest;
use App\Http\Requests\Rewiew\UpdateRewiewRequest;
use App\Services\RewiewService;
use ReflectionClass;

class AdminRewiewResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rewiews = Rewiew::paginate(6);
        return view('admin.main.rewiews.rewiewList', compact('rewiews'));
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
    public function edit(Rewiew $rewiew)
    {   
        dd(request());
        $ratings = RatingEnum::class;
        $reflection = new ReflectionClass($ratings);
        $ratingList = $reflection->getConstants();
        return view('admin.main.rewiews.rewiewUpdateForm', compact('rewiew', 'ratingList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRewiewRequest $request, Rewiew $rewiew, RewiewService $rewiewService)
    {
        $user = $request->user();
        $updatedComment = $rewiewService->update($request->validated(), $user, $rewiew);
        return redirect()->route('rewiews.show', ['rewiew' => $rewiew]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rewiew $rewiew)
    {
        $rewiew->delete();
        return redirect()->route('rewiews.index');
    }
}
