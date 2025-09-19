<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ExamFeedbackResource;
use App\Http\Resources\GuidanceResource;

use App\Models\Guidance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuidanceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, $cid)
    {
        return GuidanceResource::collection(Guidance::where('school_id', '=', $id)->where('course_id', '=', $cid)->get());
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

        // $guidance = Guidance::create([
        //     'school_id' => $request->schoolid,
        //     'course_id' => $request->courseId,
        //     'homework_id' => $request->workid,
        //     'suggestions' => $request->suggestions,
        //     'notes' => $request->notes,
        // ]);
        $guidance = null;

        if ($request->type == 'suggestion') {
            $guidance = Guidance::updateOrCreate(
                [
                    'school_id' => $request->schoolid,
                    'course_id' => $request->courseid,
                    'homework_id' => $request->workid,
                    'type' => $request->type,
                ],
                [

                    'resource_id' => $request->resourceid,
                    // 'suggestions' => $request->suggestions,
                    'content' => $request->info,
                ]
            );
            //notes
            if ($request->notecontent != null) {
                $guidance = Guidance::updateOrCreate(
                    [
                        'school_id' => $request->schoolid,
                        'course_id' => $request->courseid,
                        'homework_id' => $request->workid,
                        'type' => 'note',
                    ],
                    [

                        'resource_id' => $request->noteid,
                        'content' => $request->notecontent,
                    ]
                );
            }


        }

        $resourceIds = $request->input('resourceids');

        if (is_array($resourceIds)) {
            // foreach ((array) $items as $item) {
            foreach ($resourceIds as $resourceid) {
                // if (is_numeric($resourceid)) {

                $guidance = Guidance::updateOrCreate(
                    [
                        'school_id' => $request->schoolid,
                        'course_id' => $request->courseid,
                        'homework_id' => $request->workid,
                        'type' => $request->type,
                        'resource_id' => intval($resourceid),
                    ],
                    [
                        'content' => $request->info,
                    ]
                );
                // }
            }

        }



        if ($guidance) {
            return $this->sendResponse('Success', 'Guidance created or updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    public function guidanceByType($homeworkId, $type)
    {
        // return GuidanceResource::collection(
        $guidances = Guidance::where('homework_id', $homeworkId)
            ->where('type', '=', $type)
            ->get();
        // );

        foreach ($guidances as $guidance) {
            $response = Http::withToken(env('TEACHERSDESK_API_TOKEN'))
                ->get(env('TEACHERSDESK_URL') . $type . '/' . $guidance->resource_id);

            // dd($response->json());
            if ($response->successful()) {
                $data = $response->json();

                // If material is empty array, treat it as null
                if (empty($data) || !is_array($data) || array_is_list($data)) {
                    $guidance->resource = null;
                } else {
                    $guidance->resource = $data;
                }

                // if ($response->isEmpty()) {
                //     $guidance->resource = $data; // attach material data
                // } else {
                //     $guidance->resource = null;
                // }

            } else {
                $guidance->resource = null; // fallback if API fails
            }
        }
        return $guidances;

    }


    /**
     * Display the specified resource.
     */
    public function show(Guidance $guidance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guidance $guidance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guidance $guidance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guidance $guidance)
    {
        //
    }
}
