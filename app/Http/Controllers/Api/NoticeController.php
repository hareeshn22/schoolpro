<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\NoticeResource;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a leaves of the student.
     */
    public function snotices($id)
    {
        //
        return NoticeResource::collection(Notice::where('student_id', '=', $id)->get());

    }
    /**
     * Display a leaves of the teacher.
     */
    public function tnotices($id)
    {
        //
        return NoticeResource::collection(Notice::where('user_type', '=', 'teacher')->get());

    }
    public function snotice($id)
    {
        //
        return Notice::where('student_id', '=', $id)->first();

    }
    public function tnotice($id)
    {
        //
        return Notice::where('user_type', '=', 'teacher')->first();

    }

    /**
     * Display a listing of the resource.
     */
    public function noticesbyc($id, $cate)
    {
        //
        return NoticeResource::collection(Notice::where('school_id', '=', $id)->where('user_type', '=', $cate)->get());

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
        if ($request->usertype == 'student') {
            $items = $request->notices;
            // if ($items = $request->notices) {
            foreach ((array) $items as $item) {
                $notice = Notice::create([
                    'school_id'  => $item['schoolId'],
                    'student_id' => $item['studentId'],
                    'user_type'  => $request->usertype,
                    'notice'     => $item['notice'],
                ]);
            }
            // }

        } else {
            $notice = Notice::create([
                'school_id' => $request->schoolId,
                'user_type' => $request->usertype,
                'notice' => $request->notice,
            ]);
        }


        if ($notice) {
            return $this->sendResponse('Success', 'Notice created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function storenotices(Request $request)
    {
        //
        if ($request->usertype == 'student') {
            $items = $request->notices;
            // if ($items = $request->notices) {
            foreach ((array) $items as $item) {
                $notice = Notice::create([
                    'school_id'  => $item['school_id'],
                    'student_id' => $item['student_id'],
                    'user_type'  => $request->usertype,
                    'notice'     => $item['notice'],
                ]);
            }
            // }

        } 


        if ($notice) {
            return $this->sendResponse('Success', 'Notice created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
