<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $schools = School::all();
        return view('admin.student.index', compact('schools'));
    }

    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Student::orderByDesc('id')->select('*'))

                ->filter(function ($query) use ($request) {

                    // if ($request->get('startDate') && $request->get('endDate')) {
                    //     $startDate = $request->get('startDate');
                    //     $endDate = $request->get('endDate');
                    //     if ($startDate && $endDate) {
                    //         $query->whereDate('appointdate', '>=', \Carbon\Carbon::parse($startDate)->format('Y-m-d'))
                    //             ->whereDate('appointdate', '<=', \Carbon\Carbon::parse($endDate)->format('Y-m-d'));
                    //     }
                    // }

                    if ($request->get('schoolId')) {
                        $schoolId = $request->get('schoolId');
                        if ($schoolId) {
                            $query->where('school_id', '=', $schoolId);
                        }
                    }

                })
                ->addColumn('coursename', function ($query) {
                    $name = $query->course->name;
                    // $html =  $name ;
                    return $name;
                })
                ->addColumn('name', function ($query) {
                    $fname = $query->first_name;
                    $lname = $query->last_name;
                    // $html =  $name ;
                    return $fname . ' ' . $lname;
                })
                ->addColumn('action', 'admin.helper.viewaction')
                ->rawColumns(['action', 'coursename', 'name'])
                ->addIndexColumn()
                ->make(true);
        }

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
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
