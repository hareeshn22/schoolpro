<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\News;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {

        // $stcount = Student::count();
        // $tecount = Teacher::count();
        // $prcount = Principal::count();
        // $gucount = Guardian::count();
        // $scount = School::count();

        // $pacount = Page::count();
        // $sycount = Syllabus::count();
        $school = School::find($id);
        $svideo = News::orderByDesc('id')->where('school_id', '=', $id)->where('category', '=', 'school')->first();
        $tvideo = News::orderByDesc('id')->where('school_id', '=', $id)->where('category', '=', 'teachersdesk')->first();

        $data['logo']    = $school->logo;
        $data['svideo']  = $svideo;
        $data['tvideo']  = $tvideo;

        return response()->json($data);

    }
}
