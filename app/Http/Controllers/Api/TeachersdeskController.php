<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeachersdeskController extends BaseController
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
    public function lessons($subj)
    {
        //
        $response = Http::withToken(env('TEACHERSDESK_API_TOKEN'))
            ->get('http://127.0.0.1:7200/api/1/lessonsbys/' . $subj);

        if ($response->successful()) {
            $lessons = $response->json();
            return $lessons;
            // Use or sync the data...
        } else
            return $response;



    }

    /**
     * Show the form for creating a new resource.
     */
    public function topics($lid)
    {
        //
        $response = Http::withToken(env('TEACHERSDESK_API_TOKEN'))
            ->get('http://127.0.0.1:7200/api/1/topics/' . $lid);

        if ($response->successful()) {
            $lessons = $response->json();
            return $lessons;
            // Use or sync the data...
        } else
            return $response;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function subtopics($tid)
    {
        //
        $response = Http::withToken(env('TEACHERSDESK_API_TOKEN'))
            ->get('http://127.0.0.1:7200/api/1/subtopics/' . $tid);

        if ($response->successful()) {
            $lessons = $response->json();
            return $lessons;
            // Use or sync the data...
        } else
            return $response;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function materials($tid)
    {
        //
        $response = Http::withToken(env('TEACHERSDESK_API_TOKEN'))
            ->get(env('TEACHERSDESK_URL') . 'materials/' . $tid);

        if ($response->successful()) {
            $lessons = $response->json();
            return $lessons;
            // Use or sync the data...
        } else
            return $response;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function examples($tid)
    {
        //
        $response = Http::withToken(env('TEACHERSDESK_API_TOKEN'))
            ->get('http://127.0.0.1:7200/api/1/examples/' . $tid);

        if ($response->successful()) {
            $lessons = $response->json();
            return $lessons;
            // Use or sync the data...
        } else
            return $response;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function videos($tid)
    {
        //
        $response = Http::withToken(env('TEACHERSDESK_API_TOKEN'))
            ->get(env('TEACHERSDESK_URL') . 'videos/' . $tid);

        if ($response->successful()) {
            $lessons = $response->json();
            return $lessons;
            // Use or sync the data...
        } else
            return $response;

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
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
