<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepurposalRequest;
use App\Http\Requests\UpdatepurposalRequest;
use App\Models\purposal;

class PurposalController extends Controller
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
     * @param  \App\Http\Requests\StorepurposalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepurposalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purposal  $purposal
     * @return \Illuminate\Http\Response
     */
    public function show(purposal $purposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purposal  $purposal
     * @return \Illuminate\Http\Response
     */
    public function edit(purposal $purposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepurposalRequest  $request
     * @param  \App\Models\purposal  $purposal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepurposalRequest $request, purposal $purposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purposal  $purposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(purposal $purposal)
    {
        //
    }
}
