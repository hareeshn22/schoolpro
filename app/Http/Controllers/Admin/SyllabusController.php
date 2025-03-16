<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Course;
use App\Models\Syllabus;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Syllabus::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->addColumn('coursename', function ($query) {
                    $name = $query->course->name;
                    // $html =  $name ;
                    return $name;
                })
                ->rawColumns(['action', 'coursename'])
                ->addIndexColumn()
                ->make(true);
        }

        $schools = School::all();

        return view('admin.syllabus.index', ['schools' => $schools]);

    }

    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Syllabus::orderByDesc('id')->with('course')->select('*'))

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
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        $courses = Course::all();
        return view('admin.syllabus.add', ['schools' => $schools, 'courses' => $courses]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'schoolid' => 'required',
            'courseid'     => 'required',
            'syllabus'     => 'required',
        ]);

        $name = $request->syllabus->getClientOriginalName();
        $file = $request->syllabus->move(public_path('uploads/pdf'), $name);


        // $request->syllabus->store('public/uploads/pdf');


        Syllabus::create([
            'school_id' => $request->schoolid,
            'course_id' => $request->courseid,
            'name'      => $name,
        ]);

        return back()->with('success', 'You have successfully created the curriculum.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Syllabus $syllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Syllabus $syllabus)
    {
        //
    }
}
