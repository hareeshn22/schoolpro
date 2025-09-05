<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academic;
use App\Models\School;
use App\Http\Resources\AcademicResource;
use Illuminate\Http\Request;
use Hash;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        if (request()->ajax()) {
            return datatables()->of(Academic::select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $schools = School::all();
        return view('admin.principal.index', ['schools' => $schools]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $schools = School::all();
        return view('admin.academic.add-term', ['schools' => $schools]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function academicbys(Request $request)
    {
        //
         return AcademicResource::collection(Academic::where('school_id', '=', $request->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'schoolid' => 'required',
            'category' => 'required',
            'language' => 'required',
            'end_date' => 'required',
            ''
        ]);

        Academic::create([
            'school_id' => $request->schoolid,
            'name' => $request->fname,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'You have successfully created the principal.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academic $academic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academic $academic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academic $academic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academic $academic)
    {
        //
    }
}
