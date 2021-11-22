<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use App\Http\Requests\StoreAdditionalRequest;
use App\Http\Requests\UpdateAdditionalRequest;

class AdditionalController extends Controller
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
     * @param  \App\Http\Requests\StoreAdditionalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdditionalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Additional  $additional
     * @return \Illuminate\Http\Response
     */
    public function show(Additional $additional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Additional  $additional
     * @return \Illuminate\Http\Response
     */
    public function edit(Additional $additional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdditionalRequest  $request
     * @param  \App\Models\Additional  $additional
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdditionalRequest $request, Additional $additional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Additional  $additional
     * @return \Illuminate\Http\Response
     */
    public function destroy(Additional $additional)
    {
        //
    }
}
