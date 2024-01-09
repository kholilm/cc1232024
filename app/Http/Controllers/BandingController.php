<?php

namespace App\Http\Controllers;

use App\Models\BandingModel;
use Illuminate\Http\Request;

class BandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('view-banding', [
            "title" => 'Banding'
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BandingModel $bandingModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BandingModel $bandingModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BandingModel $bandingModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BandingModel $bandingModel)
    {
        //
    }
}
