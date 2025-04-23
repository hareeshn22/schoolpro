<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        return SubjectResource::collection(Subject::where('school_id', '=', $id)->get());

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
        $subject = Subject::create([
            'school_id' => $request->schoolid,
            'name'      => $request->name,
        ]);

        if ($subject) {
            return $this->sendResponse('Success', 'Subject created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $subject = Subject::find($request->id);

        // $subject->school_id = $request->schoolid;
        $subject->name = $request->name;

        if ($subject->save()) {
            return $this->sendResponse('Success', 'Subject Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
