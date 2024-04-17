<?php

namespace App\Http\Controllers;

use App\Models\Junkshop;
use App\Http\Requests\StoreJunkshopRequest;
use App\Http\Requests\UpdateJunkshopRequest;

class JunkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('junkshop.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJunkshopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Junkshop $junkshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Junkshop $junkshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJunkshopRequest $request, Junkshop $junkshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Junkshop $junkshop)
    {
        //
    }
}
