<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Guardian;
use App\Models\Principal;
use App\Models\Page;
use App\Models\Student;
use App\Models\Syllabus;



class HomeController extends Controller
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
    public function index()
    {

        $stcount = Student::count();
        $tecount = Teacher::count();
        $prcount = Principal::count();
        $gucount = Guardian::count();
        $scount  = School::count();

        $pacount = Page::count();
        $sycount = Syllabus::count();


        return view('admin.home', 
        [
            'stcount'=> $stcount, 
            'tecount'=> $tecount,
            'prcount'=> $prcount,
            'gucount'=> $gucount,
            'scount' => $scount,
            'pacount'=> $pacount,
            'sycount' => $sycount,
        ]);
    }
}
