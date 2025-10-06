<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\SportResource;
use App\Http\Resources\SportTodayResource;
use App\Models\Sport;
use App\Models\Trainer;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class SportController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return SportResource::collection(Sport::where('school_id', '=', $id)->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function sportsbyt($id)
    {

        $today = strtolower(now()->format('l'));

        $trainer = Trainer::with([
            'sports.timetables' => function ($query) use ($today) {
                $query->where('day_of_week', $today);
            },
            'sports.students'
        ])->findOrFail($id);

        // ✅ This is a collection (sports), safe to pass to Resource::collection
        return SportResource::collection($trainer->sports);

    }

    /**
     * Display a listing of the resource.
     */
    public function sportstoday($id)
    {

        // $today = strtolower(now()->format('l'));

        // $trainer = Trainer::with([
        //     'sports.timetables' => function ($query) use ($today) {
        //         $query->where('day_of_week', $today);
        //     },
        //     'sports.students'
        // ])->findOrFail($id);
        $trainer = Trainer::with(['sports.timetables', 'sports.students'])->findOrFail($id);

        // ✅ This is a collection (sports), safe to pass to Resource::collection
        return SportTodayResource::collection($trainer->sports);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function registerStudents(Request $request)
    {
        // dd('Hit registerStudents');
        //
        // try {
        // $validated = $request->validate([
        //     'sportid' => 'required|exists:sports,id',
        //     'trainerid' => 'nullable|exists:trainers,id',
        //     'studentids' => 'required|array',
        //     'studentids.*' => 'exists:students,id',
        // ]);
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     return response()->json(['errors' => $e->errors()], 422);
        // }


        // $sport = Sport::findOrFail($request->sportid);
        // $$sport->students()->sync($request->studentids);

        // return $this->sendResponse('Success', 'Students registered successfully.');
        $studentids = $request->studentids;

        foreach ($studentids as $studentId) {
            $addSt = DB::table('sport_students')->updateOrInsert(
                [
                    'sport_id' => $request->sportid,
                    'student_id' => $studentId,
                ],
                [
                    'trainer_id' => $request->trainerid ?? null,
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
        if ($addSt) {
            return $this->sendResponse('Success', 'Students registered successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
        if ($addSt) {
            return $this->sendResponse('Success', 'Students registered successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }


    public function groupByStudents($id)
    {
        $sport = Sport::findOrFail($id);

        // Group students by course (class)
        $grouped = $sport->students
            ->groupBy('course.name')
            ->map(function ($students, $course) {
                $maleCount = $students->where('gender', 'male')->count();
                $femaleCount = $students->where('gender', 'female')->count();
                return [
                    'course' => $course,
                    'total' => $students->count(),
                    'male' => $maleCount,
                    'female' => $femaleCount,
                ];
            })
            ->values();
        return response()->json(
            $grouped
        );
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
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        //
    }
}
