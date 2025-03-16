<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use App\Models\School;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // if (request()->ajax()) {
        //     return datatables()->of(Guardian::orderByDesc('id')->select('*'))
        //         ->addColumn('action', 'admin.helper.action')
        //         ->rawColumns(['action'])
        //         ->addIndexColumn()
        //         ->make(true);
        // }

        $schools = School::all();
        return view('admin.guardian.index', compact('schools'));

    }

    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Guardian::orderByDesc('id')->select('*'))

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
                ->addColumn('action', 'admin.helper.viewaction')
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
    public function show(Guardian $guardian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guardian $guardian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        //
    }
}
