<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\ExamResultController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\HomeworkController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\NoticeController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PeriodController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\SlotController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\TeacherController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Api\SubjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post('teacher/login', [LoginController::class, 'login']);
// Route::post('teacher/logout', [LoginController::class, 'logout']);

// Principal Routes
Route::prefix('1')->group(function () {

    Route::post('/principal/login', [LoginController::class, 'login']);
    Route::post('/principal/logout', [LoginController::class, 'logout']);

    Route::middleware(['auth:sanctum'])->prefix('principal')->group(function () {

        // Students
        Route::get('/students/{id}', [StudentController::class, 'index']);
        Route::get('/students/{sid}/{cid}', [StudentController::class, 'studentsbys']);
        Route::get('/studentsinfo/{cid}', [StudentController::class, 'studentsinfo']);
        Route::get('/student/{id}', [StudentController::class, 'show']);
        Route::post('/storestudent', [StudentController::class, 'store']);
        // Route::post('/storestudent', [StudentController::class, 'storeMulti']);
        Route::post('/updatestudent', [StudentController::class, 'update']);
        Route::get('/studentdel/{id}', [StudentController::class, 'delete']);
        Route::post('/studentreport', [StudentController::class, 'report']);

        // Teachers
        Route::get('/teachers/{id}', [TeacherController::class, 'index']);
        Route::get('/teachersbyd/{id}', [TeacherController::class, 'Teacherbyd']);
        Route::get('/teacher/{id}', [TeacherController::class, 'show']);
        Route::post('/storeteacher', [TeacherController::class, 'store']);
        Route::post('/updateteacher', [TeacherController::class, 'update']);
        Route::get('/cndel/{id}', [TeacherController::class, 'delete']);

        // Subjects
        Route::get('/subjects/{id}', [SubjectController::class, 'index']);
        Route::get('/subject/{id}', [SubjectController::class, 'show']);
        Route::post('/storesubject', [SubjectController::class, 'store']);
        Route::post('/updatesubject', [SubjectController::class, 'update']);
        Route::get('/subjectdel/{id}', [SubjectController::class, 'destroy']);

        // Courses
        Route::get('/courses/{id}', [CourseController::class, 'index']);
        Route::get('/coursesbys/{id}', [CourseController::class, 'villagebyd']);
        Route::get('/course/{id}', [CourseController::class, 'show']);
        Route::post('/storecourse', [CourseController::class, 'store']);
        Route::post('/updatecourse', [CourseController::class, 'update']);
        Route::get('/delcourse/{id}', [CourseController::class, 'destroy']);

        // Attendance
        Route::get('/attends/{sid}/{cid}', [AttendanceController::class, 'index']);
        Route::get('/attendsbyc/{sid}/{cid}/{slot}', [AttendanceController::class, 'attendsbyc']);
        Route::get('/wattendsbyc/{sid}/{cid}/{slot}', [AttendanceController::class, 'wattendsbyc']);
        Route::get('/attends/{id}', [AttendanceController::class, 'show']);
        Route::post('/storeattend', [AttendanceController::class, 'store']);
        Route::post('/updateattend', [AttendanceController::class, 'update']);
        Route::get('/delattend/{id}', [AttendanceController::class, 'delete']);

        // Homework
        Route::get('/work/{sid}/{cid}', [HomeworkController::class, 'index']);
        Route::get('/tworkdata/{sid}/{cid}/{date}', [HomeworkController::class, 'tworkdata']);
        Route::get('/work/{id}', [HomeworkController::class, 'show']);
        Route::post('/storework', [HomeworkController::class, 'store']);
        Route::post('/updatework', [HomeworkController::class, 'update']);
        Route::get('/delwork/{id}', [HomeworkController::class, 'delete']);

        // Exam
        Route::get('/exams/{sid}/{cid}', [ExamController::class, 'index']);
        Route::get('/attendsbyc/{id}', [ExamController::class, 'villagebyd']);
        Route::get('/exam/{id}', [ExamController::class, 'show']);
        Route::post('/storeexam', [ExamController::class, 'store']);
        Route::post('/updateexam', [ExamController::class, 'update']);
        Route::get('/delexam/{id}', [ExamController::class, 'delete']);

        // ExamResult
        Route::get('/examresults/{eid}/{sid}', [ExamResultController::class, 'index']);
        Route::get('/resultsbyexam/{eid}/', [ExamResultController::class, 'resultbyexam']);

        // Leaves
        Route::get('/leaves/{id}', [LeaveController::class, 'index']);
        Route::get('/leavesbyc/{id}/{cate}', [LeaveController::class, 'leavesbyc']);
        Route::get('/leave/{id}', [LeaveController::class, 'show']);
        Route::post('/storeleave', [LeaveController::class, 'store']);
        Route::post('/updateleave', [LeaveController::class, 'update']);
        Route::get('/leavedel/{id}', [LeaveController::class, 'delete']);

        // Schedule
        Route::get('/timetables/{sid}/{cid}', [ScheduleController::class, 'index']);
        Route::get('/timetable/{sid}/{cid}/{day}', [ScheduleController::class, 'timebyday']);
        Route::get('/time/{id}', [ScheduleController::class, 'show']);
        Route::post('/storetime', [ScheduleController::class, 'store']);
        Route::post('/updatetime', [ScheduleController::class, 'update']);
        Route::get('/deltime/{id}', [ScheduleController::class, 'delete']);

        // News
        Route::get('/news/{id}', [NewsController::class, 'index']);
        Route::get('/newsbyt/{id}', [NewsController::class, 'newsbyt']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/storenews', [NewsController::class, 'store']);
        Route::post('/updatenews', [NewsController::class, 'update']);
        Route::get('/delnews/{id}', [NewsController::class, 'delete']);

        // Notice
        Route::get('/notices/{id}', [NoticeController::class, 'index']);
        // Route::get('/noticebys/{id}', [NoticeController::class, 'villagebyd']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/storenotice', [NoticeController::class, 'store']);
        Route::post('/storenotices', [NoticeController::class, 'storenotices']);
        Route::post('/updatenotice', [NewsController::class, 'update']);
        Route::get('/delnotice/{id}', [NewsController::class, 'delete']);

        // Pages
        Route::get('/pages/{id}', [PageController::class, 'index']);
        Route::get('/pages/{app}/{name}', [PageController::class, 'singlepage']);
        Route::get('/pagesbys/{id}', [PageController::class, 'villagebyd']);

        // Slots
        Route::get('/slots/{id}', [SlotController::class, 'index']);
        Route::get('/slot/{id}', [SlotController::class, 'show']);

        // Period
        Route::get('/periods/{id}', [PeriodController::class, 'index']);
        Route::get('/attendsbyc/{id}', [PeriodController::class, 'villagebyd']);
        Route::get('/period/{id}', [PeriodController::class, 'show']);
        Route::post('/storeperiod', [PeriodController::class, 'store']);
        Route::post('/updateperiod', [PeriodController::class, 'update']);
        Route::get('/delperiod/{id}', [PeriodController::class, 'delete']);

        // Settings
        // Route::get('/settings/{id}', [SettingsController::class, 'index']);

        // // Hospital
        // Route::get('/hospital/{id}', [HospitalController::class, 'hospital']);

        // // Home
        Route::get('/home/{id}', [HomeController::class, 'index']);
        // Route::get('/finalreport', [HomeController::class, 'final']);

    });

});

// Teacher Routes
Route::prefix('1')->group(function () {

    Route::post('/teacher/login', [LoginController::class, 'teachlogin']);
    Route::post('/teacher/logout', [LoginController::class, 'teachlogout']);

    Route::middleware(['auth:sanctum'])->prefix('teacher')->group(function () {

        // Students
        Route::get('/students/{id}', [StudentController::class, 'index']);
        Route::get('/students/{sid}/{cid}', [StudentController::class, 'studentsbys']);
        Route::get('/student/{id}', [StudentController::class, 'show']);
        // Route::post('/storestudent', [StudentController::class, 'store']);
        // // Route::post('/storestudent', [StudentController::class, 'storeMulti']);
        // Route::post('/updatestudent', [StudentController::class, 'update']);
        // Route::get('/studentdel/{id}', [StudentController::class, 'delete']);
        // Route::post('/studentreport', [StudentController::class, 'report']);

        // Teacher
        Route::get('/teacher/{id}', [TeacherController::class, 'show']);



        // Subjects
        Route::get('/subjects/{id}', [SubjectController::class, 'index']);
        Route::get('/subject/{id}', [SubjectController::class, 'show']);
        // Route::post('/storesubject', [SubjectController::class, 'store']);
        // Route::post('/updatesubject', [SubjectController::class, 'update']);
        // Route::get('/subjectdel/{id}', [SubjectController::class, 'destroy']);

        // Courses
        Route::get('/courses/{id}', [CourseController::class, 'index']);
        Route::get('/coursesbyt/{id}', [CourseController::class, 'coursebyt']);
        Route::get('/course/{id}', [CourseController::class, 'show']);
        // Route::post('/storecourse', [CourseController::class, 'store']);
        // Route::post('/updatecourse', [CourseController::class, 'update']);
        // Route::get('/delcourse/{id}', [CourseController::class, 'destroy']);

        // Attendance
        Route::get('/attends/{sid}/{cid}', [AttendanceController::class, 'index']);
        Route::get('/attendsbyc/{sid}/{cid}/{slot}', [AttendanceController::class, 'attendsbyc']);
        Route::get('/tattendsbyc/{sid}/{cid}/{slot}/{date}', [AttendanceController::class, 'tattendsbyc']);
        Route::get('/wattendsbyc/{sid}/{cid}/{slot}', [AttendanceController::class, 'wattendsbyc']);
        Route::get('/attends/{id}', [AttendanceController::class, 'show']);
        Route::post('/storeattend', [AttendanceController::class, 'store']);
        // Route::post('/updateattend', [AttendanceController::class, 'update']);
        // Route::get('/delattend/{id}', [AttendanceController::class, 'delete']);

        Route::get('/absentStudents/{cid}/{slot}/{date}', [AttendanceController::class, 'absentStudents']);

        // Homework
        Route::get('/work/{sid}/{cid}', [HomeworkController::class, 'index']);
        Route::get('/workdonehbys/{sid}/{cid}/{subjid}', [HomeworkController::class, 'workdonehbys']);
        Route::get('/homework/{id}', [HomeworkController::class, 'show']);
        Route::get('/wdata/{sid}/{cid}/{subid}', [HomeworkController::class, 'wdata']);
        Route::post('/storework', [HomeworkController::class, 'store']);
        Route::post('/updatework', [HomeworkController::class, 'update']);

        Route::get('/notdoneStudents/{id}', [HomeworkController::class, 'notdoneStudents']);

        // Route::get('/delwork/{id}', [HomeworkController::class, 'delete']);

        // Exam
        Route::get('/exams/{sid}/{cid}', [ExamController::class, 'index']);
        // Route::get('/attendsbyc/{id}', [ExamController::class, 'villagebyd']);
        Route::get('/exam/{id}', [ExamController::class, 'show']);

        // Route::post('/updateexam', [ExamController::class, 'update']);
        // Route::get('/delexam/{id}', [ExamController::class, 'delete']);

        // ExamResult
        Route::get('/examresults/{eid}/{sid}', [ExamResultController::class, 'index']);
        Route::post('/storeresult', [ExamResultController::class, 'store']);

        // Leaves
        Route::get('/tleaves/{id}', [LeaveController::class, 'tleaves']);
        Route::get('/sleaves/{id}', [LeaveController::class, 'sleaves']);
        Route::get('/leavesbyc/{id}/{cate}', [LeaveController::class, 'leavesbyc']);
        Route::get('/leave/{id}', [LeaveController::class, 'show']);
        Route::post('/storeleave', [LeaveController::class, 'store']);
        Route::post('/updateleave', [LeaveController::class, 'update']);
        Route::get('/leavedel/{id}', [LeaveController::class, 'delete']);

        // Schedule
        Route::get('/timetables/{sid}/{cid}', [ScheduleController::class, 'index']);
        Route::get('/timetable/{sid}/{cid}/{day}', [ScheduleController::class, 'timebyday']);
        Route::get('/time/{id}', [ScheduleController::class, 'show']);

        Route::get('/teachtables/{sid}/{cid}', [ScheduleController::class, 'teachtables']);
        // Route::post('/storetime', [ScheduleController::class, 'store']);
        // Route::post('/updatetime', [ScheduleController::class, 'update']);
        // Route::get('/deltime/{id}', [ScheduleController::class, 'delete']);

        // News
        Route::get('/news/{id}', [NewsController::class, 'index']);
        Route::get('/newsbyt/{id}', [NewsController::class, 'newsbyt']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/storenews', [NewsController::class, 'store']);
        Route::post('/updatenews', [NewsController::class, 'update']);
        Route::get('/delnews/{id}', [NewsController::class, 'delete']);

        // Notice
        Route::get('/notices/{id}', [NoticeController::class, 'index']);
        Route::get('/noticebys/{id}', [NoticeController::class, 'villagebyd']);
        Route::get('/tnotices', [NoticeController::class, 'tnotices']);
        Route::get('/tnotice/{id}', [NoticeController::class, 'tnotice']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/storenotice', [NoticeController::class, 'store']);
        Route::post('/updatenotice', [NewsController::class, 'update']);
        Route::get('/delnotice/{id}', [NewsController::class, 'delete']);

        // Pages
        Route::get('/pages/{id}', [PageController::class, 'index']);
        Route::get('/pages/{app}/{name}', [PageController::class, 'singlepage']);
        Route::get('/pagesbys/{id}', [PageController::class, 'villagebyd']);

        // Slots
        Route::get('/slots/{id}', [SlotController::class, 'index']);
        Route::get('/slot/{id}', [SlotController::class, 'show']);

        // Period
        Route::get('/periods/{id}', [PeriodController::class, 'index']);
        Route::get('/attendsbyc/{id}', [PeriodController::class, 'villagebyd']);
        Route::get('/period/{id}', [PeriodController::class, 'show']);
        // Route::post('/storeperiod', [PeriodController::class, 'store']);
        // Route::post('/updateperiod', [PeriodController::class, 'update']);
        // Route::get('/delperiod/{id}', [PeriodController::class, 'delete']);



        // // Hospital
        // Route::get('/hospital/{id}', [HospitalController::class, 'hospital']);

        // // Home
        Route::get('/home/{id}', [HomeController::class, 'index']);
        // Route::get('/finalreport', [HomeController::class, 'final']);

    });

});

// Guardian Routes
Route::prefix('1')->group(function () {

    Route::post('guardian/login', [LoginController::class, 'guardlogin']);
    Route::post('guardian/logout', [LoginController::class, 'guardlogout']);

    Route::middleware(['auth:sanctum'])->prefix('guardian')->group(function () {

        // Students
        Route::get('/students/{id}', [StudentController::class, 'index']);
        Route::get('/students/{sid}/{cid}', [StudentController::class, 'studentsbys']);
        Route::get('/student/{id}', [StudentController::class, 'show']);
        // Route::post('/storestudent', [StudentController::class, 'store']);
        // // Route::post('/storestudent', [StudentController::class, 'storeMulti']);
        // Route::post('/updatestudent', [StudentController::class, 'update']);
        // Route::get('/studentdel/{id}', [StudentController::class, 'delete']);
        Route::post('/studentreport', [StudentController::class, 'report']);

        // Teachers
        Route::get('/teachers/{id}', [TeacherController::class, 'index']);
        Route::get('/teachersbyd/{id}', [TeacherController::class, 'Teacherbyd']);
        Route::get('/teacher/{id}', [TeacherController::class, 'show']);
        // Route::post('/storeteacher', [TeacherController::class, 'store']);
        // Route::post('/updateteacher', [TeacherController::class, 'update']);
        // Route::get('/cndel/{id}', [TeacherController::class, 'delete']);

        // Subjects
        Route::get('/subjects/{id}', [SubjectController::class, 'index']);
        Route::get('/subject/{id}', [SubjectController::class, 'show']);
        // Route::post('/storesubject', [SubjectController::class, 'store']);
        // Route::post('/updatesubject', [SubjectController::class, 'update']);
        // Route::get('/subjectdel/{id}', [SubjectController::class, 'destroy']);

        // Courses
        Route::get('/courses/{id}', [CourseController::class, 'index']);
        Route::get('/coursesbys/{id}', [CourseController::class, 'villagebyd']);
        Route::get('/course/{id}', [CourseController::class, 'show']);
        // Route::post('/storecourse', [CourseController::class, 'store']);
        // Route::post('/updatecourse', [CourseController::class, 'update']);
        // Route::get('/delcourse/{id}', [CourseController::class, 'destroy']);

        // Attendance
        Route::get('/attendsbyst/{sid}/{week}', [AttendanceController::class, 'attendsbyst']);
        Route::get('/attendsbyc/{sid}/{cid}/{slot}', [AttendanceController::class, 'attendsbyc']);
        Route::get('/attends/{id}', [AttendanceController::class, 'show']);
        // Route::post('/storeattend', [AttendanceController::class, 'store']);
        // Route::post('/updateattend', [AttendanceController::class, 'update']);
        // Route::get('/delattend/{id}', [AttendanceController::class, 'delete']);

        // Homework
        Route::get('/work/{sid}/{cid}', [HomeworkController::class, 'index']);
        Route::get('/workbyc/{sid}/{cid}', [HomeworkController::class, 'workbyc']);
        Route::get('/worktoday/{sid}/{cid}', [HomeworkController::class, 'worktoday']);
        Route::get('/workweek/{sid}/{cid}', [HomeworkController::class, 'workweek']);
        Route::get('/work/{id}', [HomeworkController::class, 'show']);
        Route::post('/workdone/{id}', [HomeworkController::class, 'workdone']);
        // Route::post('/storework', [HomeworkController::class, 'store']);
        // Route::post('/updatework', [HomeworkController::class, 'update']);
        // Route::get('/delwork/{id}', [HomeworkController::class, 'delete']);

        Route::get('/notdonestudents/{id}', [HomeworkController::class, 'notdoneStudents']);

        // Exam
        Route::get('/exams/{sid}/{cid}', [ExamController::class, 'index']);
        Route::get('/attendsbyc/{id}', [ExamController::class, 'villagebyd']);
        Route::get('/exam/{id}', [ExamController::class, 'show']);
        // Route::post('/storeexam', [ExamController::class, 'store']);
        // Route::post('/updateexam', [ExamController::class, 'update']);
        // Route::get('/delexam/{id}', [ExamController::class, 'delete']);

        //ExamResult
        Route::get('/examresultsbyst/{eid}/{sid}', [ExamResultController::class, 'resultsbyst']);

        // Leaves
        Route::get('/leaves/{id}', [LeaveController::class, 'index']);
        Route::get('/leavesbyc/{id}/{cate}', [LeaveController::class, 'leavesbyc']);
        Route::get('/sleaves/{id}', [LeaveController::class, 'sleaves']);
        Route::get('/leave/{id}', [LeaveController::class, 'show']);
        Route::post('/storeleave', [LeaveController::class, 'store']);
        Route::post('/updateleave', [LeaveController::class, 'update']);
        Route::get('/leavedel/{id}', [LeaveController::class, 'delete']);

        // Schedule
        Route::get('/timetables/{sid}/{cid}', [ScheduleController::class, 'index']);
        Route::get('/timetable/{sid}/{cid}/{day}', [ScheduleController::class, 'timebyday']);
        Route::get('/time/{id}', [ScheduleController::class, 'show']);
        // Route::post('/storetime', [ScheduleController::class, 'store']);
        // Route::post('/updatetime', [ScheduleController::class, 'update']);
        // Route::get('/deltime/{id}', [ScheduleController::class, 'delete']);

        // News
        Route::get('/news/{id}', [NewsController::class, 'index']);
        Route::get('/newsbyt/{id}', [NewsController::class, 'newsbyt']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        // Route::post('/storenews', [NewsController::class, 'store']);
        // Route::post('/updatenews', [NewsController::class, 'update']);
        // Route::get('/delnews/{id}', [NewsController::class, 'delete']);

        // Notice
        Route::get('/snotices/{id}', [NoticeController::class, 'snotices']);
        Route::get('/snotice/{id}', [NoticeController::class, 'snotice']);
        Route::get('/notices/{id}', [NoticeController::class, 'index']);
        Route::get('/noticebys/{id}', [NoticeController::class, 'villagebyd']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/storenotice', [NoticeController::class, 'store']);
        Route::post('/updatenotice', [NewsController::class, 'update']);
        Route::get('/delnotice/{id}', [NewsController::class, 'delete']);

        // Pages
        Route::get('/pages/{id}', [PageController::class, 'index']);
        Route::get('/pages/{app}/{name}', [PageController::class, 'singlepage']);
        Route::get('/pagesbys/{id}', [PageController::class, 'villagebyd']);

        // Slots
        Route::get('/slots/{id}', [SlotController::class, 'index']);
        Route::get('/slot/{id}', [SlotController::class, 'show']);

        // Period
        Route::get('/periods/{id}', [PeriodController::class, 'index']);
        Route::get('/attendsbyc/{id}', [PeriodController::class, 'villagebyd']);
        Route::get('/period/{id}', [PeriodController::class, 'show']);
        // Route::post('/storeperiod', [PeriodController::class, 'store']);
        // Route::post('/updateperiod', [PeriodController::class, 'update']);
        // Route::get('/delperiod/{id}', [PeriodController::class, 'delete']);

        // Settings
        // Route::get('/settings/{id}', [SettingsController::class, 'index']);

        // // Hospital
        // Route::get('/hospital/{id}', [HospitalController::class, 'hospital']);

        // // Home
        Route::get('/home/{id}', [HomeController::class, 'index']);
        // Route::get('/finalreport', [HomeController::class, 'final']);

    });

});
