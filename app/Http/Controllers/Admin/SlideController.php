<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Slide;
use App\Models\Image;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Slide::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.slide.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Slide::orderByDesc('id')->select('*'))

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
                ->addColumn('school', function ($query) {
                    $name = $query->school->name;
                    // $html =  $name ;
                    return $name;
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
        $images = Image::paginate(9);
        $schools = School::all();
        return view('admin.slide.add', compact('schools', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'image' => 'required',
        ]);

        Slide::create([
            'school_id' => $request->schoolid,
            'image' => $request->image,
        ]);

        return back()->with('success', 'You have successfully created the slide.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $schools = School::all();
        $images = Image::paginate(9);
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide' => $slide, 'images' => $images, 'schools' => $schools]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $slide = Slide::find($request->id);

        // $school->school_id = $request->schoolid;
        // $slide->school_id = $request->schoolid;
        $slide->image = $request->image;

        $slide->save();

        return redirect()->back()->with('success', 'You have successfully updated the slide.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $school = School::find($id);
        $school->delete();

        return redirect()->back()->with('success', 'You have successfully deleted the school.');

    }
}
