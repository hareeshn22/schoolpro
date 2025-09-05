<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AI;
use App\Models\School;
use Illuminate\Http\Request;

class AIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $schools = School::all();
        return view('admin.ai.add-attendance', ['schools' => $schools]);
    }

    public function createhome()
    {
        //
        $schools = School::all();
        return view('admin.ai.add-homework', ['schools' => $schools]);
    }
    public function createoption()
    {
        //
        $schools = School::all();
        return view('admin.ai.add-workoption', ['schools' => $schools]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(AI $schoolAI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AI $schoolAI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AI $schoolAI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AI $schoolAI)
    {
        //
    }
}
