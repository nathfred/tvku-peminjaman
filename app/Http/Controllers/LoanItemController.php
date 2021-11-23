<?php

namespace App\Http\Controllers;

use App\Models\LoanItem;
use App\Http\Requests\StoreLoanItemRequest;
use App\Http\Requests\UpdateLoanItemRequest;

class LoanItemController extends Controller
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
     * @param  \App\Http\Requests\StoreLoanItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function show(LoanItem $loanItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanItem $loanItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoanItemRequest  $request
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoanItemRequest $request, LoanItem $loanItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanItem  $loanItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanItem $loanItem)
    {
        //
    }
}
