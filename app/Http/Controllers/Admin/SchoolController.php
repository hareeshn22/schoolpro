<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Image;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if (request()->ajax()) {
            return datatables()->of(School::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $schools = School::all();
        return view('admin.school.index', ['schools' => $schools]);

        //  return view('admin.school.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $images = Image::paginate(9);
        return view('admin.school.add', compact('images'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            // 'logo'  => 'required',
            'content' => 'required',
            'phone' => 'required',
        ]);

        School::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'descr' => $request->content,
            'phone' => $request->phone,
            'address' => $request->address,
            'pcolor' => $request->pcolor,
            'scolor' => $request->scolor,
        ]);

        return back()->with('success', 'You have successfully created the school.');

    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $images = Image::paginate(9);
        $school = School::find($id);
        return view('admin.school.edit', ['school' => $school, 'images' => $images]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $school = School::find($request->id);

        // $school->school_id = $request->schoolid;
        $school->name = $request->name;
        
        $school->descr = $request->content;
        $school->phone = $request->phone;
        $school->address = $request->address;
        $school->pcolor = $request->pcolor;
        $school->scolor = $request->scolor;

        if($request->logo != '') {
            $school->logo = $request->logo;
        }

        $school->save();

        return redirect()->back()->with('success', 'You have successfully updated the school.');

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
