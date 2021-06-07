<?php

namespace App\Http\Controllers;

use App\extra;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function vats(){
        $vats=extra::get()->first();
        return response()->Json($vats);
    }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function show(extra $extra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function edit(extra $extra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, extra $extra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function destroy(extra $extra)
    {
        //
    }
}
