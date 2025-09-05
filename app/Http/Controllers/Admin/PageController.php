<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            return datatables()->of(Page::orderByDesc('id')->select('*'))
                ->addColumn('action', 'admin.helper.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        // $schools = School::all();
        return view('admin.page.index');

    }

    /**
     * Display a listing of the resource.
     */
    public function singlepage($app, $name)
    {
        //
        return PageResource::collection(Page::where('app_name', '=', $app)->where('name', '=', $name)->get());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.page.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'appname' => 'required',
            'name'    => 'required',
            'info' => 'required',
        ]);

        Page::create([
            'app_name' => $request->appname,
            'language' =>$request->language,
            'name'    => $request->name,
            'info' => $request->info,
        ]);

        return back()->with('success', 'You have successfully created the page.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return view('admin.page.edit', ['page' => Page::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $page = Page::find($request->id);

        $page->app_name = $request->appname;
        $page->language = $request->language;
        $page->name     = $request->name;
        $page->info  = $request->info;
        $page->save();

        return redirect()->back()->with('success', 'You have successfully updated the page.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Page $id)
    {
        //
        $page = Page::find($id);
        $page->delete();

        return redirect()->back()->with('success', 'You have successfully deleted the page.');

    }
}
