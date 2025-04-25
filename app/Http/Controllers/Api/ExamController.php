<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ExamResource;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid, $cid)
    {
        //
        return ExamResource::collection(Exam::where('school_id', '=', $sid)->where('course_id', '=', $cid)->get());

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
        $exam = Exam::create([
            'school_id' => $request->schoolid,
            'course_id' => $request->courseid,
            'name'      => $request->name,
            'examdate'  => $request->examdate,
            'maxmarks'  => $request->maxmarks,
        ]);

        if ($exam) {
            return $this->sendResponse('Success', 'Exam created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return ExamResource::collection(Exam::where('id', '=', $id)->get());

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $exam = Exam::find($request->id);

        // $exam->school_id = $request->schoolid;
        $exam->name      = $request->name;
        $exam->examdate  = $request->examdate;
        $exam->maxmarks  = $request->maxmarks;

        if ($exam->save()) {
            return $this->sendResponse('Success', 'Exam Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
