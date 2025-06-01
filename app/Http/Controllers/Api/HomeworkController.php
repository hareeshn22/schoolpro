<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\HomeworkResource;
use App\Models\Homework;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

class HomeworkController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid, $cid)
    {
        //
        return HomeworkResource::collection(Homework::where('school_id', '=', $sid)
            ->where('course_id', '=', $cid)
            // ->where('workdate', '=', Carbon::today()->toDateString())
            ->get());

    }

    public function workdonehbys($sid, $cid, $subjid)
    {
        // $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->groupBy( 'course_id', 'status', )->select('course_id', 'status', DB::raw('count(*) as total', 'id'))->get())->map(function ($item) {
        //     return [
        //         // 'id',  => $item->id,
        //         'course_id' => $item->course_id,
        //         $item->status => $item->total,
        //         // 'total' => $item->total,
        //     ];
        // });
        $fdata = [];
        for ($i = 0; $i < 6; $i++) {
            $sDate = Carbon::today()->subDays($i);
            $data = HomeworkResource::collection(Homework::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('subject_id', '=', $subjid)->where('workdate', '=', $sDate)->get());
            foreach ($data as $item) {
                $id = $item->id;
                $hwdata = DB::table('homework_data')->where('homework_id', $id)->get();
                $workdate = $item->workdate;
                $merged = collect($hwdata)
                    ->groupBy([ 'status'])
                    ->map(function ($group) use ($id,$workdate, $cid) {
                        $students = Student::where('course_id', '=', $cid)->count();
                        return [
                            'id' => $id,
                            'workdate' => $workdate,
                            'Done' => $group->where('status', 'done')->count(),
                            'Not Done' => ($students - $group->where('status', 'done')->count()),
                        ];
                    })
                    ->values();

                if (count($merged) > 0) {
                    $fdata[] = $merged->collapse();
                }

            }


        }
        return $fdata;

    }

    public function notdoneStudents($id)
    {
        $homework = Homework::find($id);
        if (!$homework) {
            return $this->sendError('Homework not found.');
        }

        $hwdata = DB::table('homework_data')->where('homework_id', $id)->get();
        $students = Student::where('course_id', '=', $homework->course_id)->get();

        $notDoneStudents = $students->filter(function ($student) use ($hwdata) {
            return !$hwdata->contains('student_id', $student->id);
        })->values();

        // return $this->sendResponse($notDoneStudents, 'Not done students retrieved successfully.');
        return $notDoneStudents;
    }



    /**
     * Display a listing of the resource.
     */
    public function wdata($sid, $cid, $subid)
    {
        //
        return HomeworkResource::collection(Homework::where('school_id', '=', $sid)
            ->where('course_id', '=', $cid)
            ->where('subject_id', '=', $subid)
            ->whereBetween('workdate', [Carbon::today()->subDays(7)->toDateString(), Carbon::today()->toDateString()])
            // ->where('workdate', '<', Carbon::today()->toDateString())
            ->get());

    }

    public function worktoday($sid, $cid)
    {
        //
        return HomeworkResource::collection(Homework::where('school_id', '=', $sid)
            ->where('course_id', '=', $cid)
            ->where('workdate', '=', Carbon::today()->toDateString())
            ->get());

    }

    public function workweek($sid, $cid)
    {
        //
        return HomeworkResource::collection(
            Homework::where('school_id', '=', $sid)
                ->where('course_id', '=', $cid)
                // ->where('subject_id', '=', $subid)
                ->whereBetween('workdate', [Carbon::yesterday()->subDays(7)->toDateString(), Carbon::yesterday()->toDateString()])
                // ->where('workdate', '<', Carbon::today()->toDateString())
                ->orderBy('workdate', 'desc')
                ->get()
        )->map(function ($assignment) {
            return collect($assignment)->only(['id', 'subject', 'title', 'workdate']);
        })->groupBy('workdate');


    }

    public function tworkdata($sid, $cid, $date)
    {
        // $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->groupBy( 'course_id', 'status', )->select('course_id', 'status', DB::raw('count(*) as total', 'id'))->get())->map(function ($item) {
        //     return [
        //         // 'id',  => $item->id,
        //         'course_id' => $item->course_id,
        //         $item->status => $item->total,
        //         // 'total' => $item->total,
        //     ];
        // });
        $subjects = Subject::where('school_id', '=', $sid)->get();
        $fdata = [];
        if ($date == 'today') {
            $sDate = Carbon::today()->toDateString();
        } else {
            $sDate = Carbon::yesterday()->toDateString();
        }

        foreach ($subjects as $subject) {

            $homework = Homework::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('subject_id', '=', $subject->id)->where('workdate', '=', $sDate)->first();
            if ($homework) {
                $id = $homework->id;
                $hwdata = DB::table('homework_data')->where('homework_id', $id)->get();
                // return $hwdata;
                $merged = collect($hwdata)
                    ->groupBy(['status'])
                    ->map(function ($group, $courseId) use ($subject, $cid) {
                        $students = Student::where('course_id', '=', $cid)->count();
                        return [
                            'Subject' => $subject->name,
                            'Done' => $group->where('status', 'done')->count(),
                            'Not Done' => ($students - $group->where('status', 'done')->count()),
                        ];
                    })
                    ->values();
                // $fdata[] = $merged;

                if (count($merged) > 0) {
                    $fdata[] = $merged->collapse();
                }

            }



        }
        return $fdata;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->snapImg != null) {

            $name = $request->snapImg->getClientOriginalName();

            $file = $request->snapImg->move(public_path('uploads/'), $name);

            $thumbpath = "uploads/thumb/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 100)->save(public_path($thumbpath . $name));

            $smpath = "uploads/small/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 200)->save(public_path($smpath . $name));

            $larpath = "uploads/large/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 470)->save(public_path($larpath . $name));
        } else {
            $name = '';
        }


        $data = [
            'school_id' => $request->schoolId,
            'teacher_id' => $request->teacherId,
            'course_id' => $request->courseId,
            'subject_id' => $request->subjectId,
            'title' => $request->title,
            'image' => $name,
            'workdate' => $request->workdate,
            'content' => $request->content,
        ];

        $work = Homework::create($data);


        if ($work) {
            return $this->sendResponse('Success', 'Homework created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return HomeworkResource::collection(Homework::where('id', '=', $id)
            // ->where('course_id', '=', $cid)
            // ->where('workdate', '=', Carbon::today()->toDateString())
            ->get());
    }

    /**
     * Display the specified resource.
     */
    public function workdone(Request $request)
    {
        // $work = Homework::find($$request->id);
        $match = [
            'homework_id' => $request->workid,
            'student_id' => $request->studentId,
        ];
        $workdata = DB::table('homework_data')->updateOrInsert(
            // $match,
            [
                'school_id' => $request->schoolId,
                'homework_id' => $request->workid,
                'student_id' => $request->studentId,
                'status' => $request->status,
            ]
        );

        if ($workdata) {
            return $this->sendResponse('Success', 'Homework Done successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $homework = Homework::find(intval($request->id));

        if ($request->snapImg) {
            $image_path = 'uploads/' . $homework->image;
            $larpath = 'uploads/large/' . $homework->image;

            if (File::exists($image_path)) {
                File::delete($image_path);
                File::delete($larpath);
            }

            $name = $request->file('snapImg')->getClientOriginalName();

            $file = $request->snapImg->move(public_path('uploads/'), $name);
            $thumbpath = "uploads/thumb/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 100)->save(public_path($thumbpath . $name));

            $smpath = "uploads/small/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 200)->save(public_path($smpath . $name));

            $larpath = "uploads/large/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 470)->save(public_path($larpath . $name));


            $homework->title = $request->title;
            $homework->content = $request->content;
            if ($request->snapImg) {
                $homework->image = $name;
            } else {
                // $student->photo = $student->photo;
            }
            if ($homework->save()) {
                return $this->sendResponse('Success', 'Homework Updated successfully.');
            } else {
                return $this->sendError('Error.', ['error' => 'error occured']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homework $homework)
    {
        //
    }
}
