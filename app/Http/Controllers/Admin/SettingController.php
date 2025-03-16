<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Setting::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $schools = School::all();
        return view('admin.setting.index', ['schools' => $schools]);

    }

    public function filter(Request $request)
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Setting::orderByDesc('id')->select('*'))

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
        $schools = School::paginate(9);
        return view('admin.setting.add', compact('schools'));

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
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
