<?php

namespace App\Http\Controllers;

use App\Models\Lighting;
use App\Http\Requests\StoreLightingRequest;
use App\Http\Requests\UpdateLightingRequest;

class LightingController extends Controller
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
     * @param  \App\Http\Requests\StoreLightingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLightingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function show(Lighting $lighting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function edit(Lighting $lighting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLightingRequest  $request
     * @param  \App\Models\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLightingRequest $request, Lighting $lighting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lighting  $lighting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lighting $lighting)
    {
        //
    }
}
