<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Principal;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Principal::select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $langs    = Language::all();
        $schools = School::all();
        return view('admin.principal.index', ['schools' => $schools]);

    }
    public function prfilter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Principal::orderByDesc('id')->select('*'))

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
        //
        $schools = School::all();
        return view('admin.principal.add', ['schools' => $schools]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'schoolid' => 'required',
            'fname'    => 'required',
            'lname'    => 'required',
            'username' => 'required',
        ]);

        Principal::create([
            'school_id' => $request->schoolid,
            'name'      => $request->fname,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
        ]);

        return back()->with('success', 'You have successfully created the principal.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Principal $principal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $schools   = School::all();
        $principal = Principal::find($id);
        return view('admin.principal.edit', ['principal' => $principal, 'schools' => $schools]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Principal $principal)
    {
        //

        $principal = Principal::find($request->id);

        $principal->school_id = $request->schoolid;
        $principal->name      = $request->name;
        $principal->email     = $request->email;
        $principal->phone     = $request->phone;
        $principal->username  = $request->username;
        if ($principal->isDirty('password')) {
            $principal->password  = Hash::make($request->password);
        }

        

        $principal->save();

        return redirect()->back()->with('success', 'You have successfully updated the principal.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $principal = Principal::find($id);
        $principal->delete();

        return response()->json('You have successfully deleted the principal.');

    }
}
