<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\GroupResource;
use App\Models\Student;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, $cid)
    {
        return GroupResource::collection(Group::with('students')->where('school_id', '=', $id)->where('course_id', '=', $cid)->get());
    }

    public function students($sid,$cid)
    {
        $students = Student::query()
            ->leftJoin('group_student', 'students.id', '=', 'group_student.student_id')
            ->select('students.id', 'students.first_name', 'students.last_name', 'students.roll_no')
            ->selectRaw('IF(group_student.group_id IS NULL, "available", "assigned") as status')
            ->where('school_id', $sid)
            ->where('course_id', $cid)
            ->get();

        return $students;

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
        $group = Group::create([
            'school_id' => $request->schoolid,
            'course_id' => $request->courseid,
            'created_by' => $request->teacherid,
            'name' => $request->name,
        ]);
        if($group) {
            $as = $group->students()->syncWithoutDetaching($request->students->pluck('id'));
        }

        if ($as) {
            return $this->sendResponse('Success', 'Group created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
