<?php

use App\Http\Controllers\Api\AcademicController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventParticipantController;
use App\Http\Controllers\Api\EventHighlightController;
use App\Http\Controllers\Api\EventNoteController;
use App\Http\Controllers\Api\EventVideoController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\ExamFeedbackController;
use App\Http\Controllers\Api\ExamResultController;
use App\Http\Controllers\Api\ExamSyllabusController;
use App\Http\Controllers\Api\GuidanceController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\HomeworkController;
use App\Http\Controllers\Api\LeaveController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\NoticeController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PeriodController;
use App\Http\Controllers\Api\RemarkController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\SlotController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SportController;
use App\Http\Controllers\Api\SportAttendanceController;
use App\Http\Controllers\Api\SportTimetableController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\TeachersdeskController;
use App\Http\Controllers\Api\LessonController;
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
        Route::get('/tnotices/{id}', [NoticeController::class, 'tnotices']);
        Route::get('/snotices/{id}', [NoticeController::class, 'snotices']);
        Route::get('/snotices', [NoticeController::class, 'snotices']);
        Route::get('/allsnotices/{id}', [NoticeController::class, 'allsnotices']);
        // Route::get('/noticebys/{id}', [NoticeController::class, 'villagebyd']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/storenotice', [NoticeController::class, 'store']);
        Route::post('/storenotices', [NoticeController::class, 'storenotices']);
        Route::post('/updatenotice', [NoticeController::class, 'update']);
        Route::get('/delnotice/{id}', [NoticeController::class, 'delete']);

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

        // Lessons
        Route::get('/lessons/{id}', [LessonController::class, 'index']);
        Route::get('/lessonsbyc/{id}/{cate}', [LessonController::class, 'leavesbyc']);
        Route::get('/lesson/{id}', [LessonController::class, 'show']);
        Route::post('/storelesson', [LessonController::class, 'store']);
        Route::post('/updatelesson', [LessonController::class, 'update']);
        Route::get('/lessondel/{id}', [LessonController::class, 'delete']);

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
        Route::get('/worktodaybys/{sid}/{cid}/{subid}', [HomeworkController::class, 'worktodaybys']);
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
        Route::get('/tnotices/{id}', [NoticeController::class, 'tnotices']);
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

        // Academic Attendance AI
        Route::get('/attendance-ai/{id}', [AcademicController::class, 'index']);
        Route::get('/newsbyt/{id}', [NewsController::class, 'newsbyt']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/storenews', [NewsController::class, 'store']);
        Route::post('/updatenews', [NewsController::class, 'update']);
        Route::get('/delnews/{id}', [NewsController::class, 'delete']);

        // Lessons
        Route::get('/lessons/{id}/{cid}/{sid}', [LessonController::class, 'index']);
        Route::get('/sLessons/{id}', [LessonController::class, 'sLessons']);
        // Route::get('/Lessonsbyc/{id}/{cate}', [LessonController::class, 'Lessonsbyc']);
        Route::get('/lesson/{id}', [LessonController::class, 'show']);
        Route::post('/storelesson', [LessonController::class, 'store']);
        Route::post('/updatelesson', [LessonController::class, 'update']);
        Route::get('/lessondel/{id}', [LessonController::class, 'delete']);

        //Remark
        Route::get('/remarks/{id}', [RemarkController::class, 'show']);
        Route::get('/remarksbyc/{sid}/{cid}/{hid}', [RemarkController::class, 'remarksbyc']);
        Route::post('/storeremark', [RemarkController::class, 'store']);

        // Exam Syllabus
        Route::get('/examsyllabus/{eid}/{sid}', [ExamSyllabusController::class, 'index']);
        // Route::get('/examsyllabus/{id}', [ExamSyllabusController::class, 'sExamSyllabuss']);
        // Route::get('/ExamSyllabussbyc/{id}/{cate}', [ExamSyllabusController::class, 'ExamSyllabussbyc']);
        Route::get('/ExamSyllabus/{id}', [ExamSyllabusController::class, 'show']);
        Route::post('/storeExamSyllabus', [ExamSyllabusController::class, 'store']);
        Route::post('/updateExamSyllabus', [ExamSyllabusController::class, 'update']);
        Route::get('/examsyllabusdel/{id}', [ExamSyllabusController::class, 'delete']);

        // Exam Feedback
        Route::get('/Feedback/{cid}/{sid}', [ExamFeedbackController::class, 'tExamFeedbacks']);
        Route::get('/examFeedback/{id}', [ExamFeedbackController::class, 'sExamFeedbacks']);
        // Route::get('/ExamFeedbacksbyc/{id}/{cate}', [ExamFeedbackController::class, 'ExamFeedbacksbyc']);
        Route::get('/ExamFeedback/{id}', [ExamFeedbackController::class, 'show']);
        Route::post('/storeExamFeedback', [ExamFeedbackController::class, 'store']);
        Route::post('/updateExamFeedback', [ExamFeedbackController::class, 'update']);
        Route::get('/ExamFeedbackdel/{id}', [ExamFeedbackController::class, 'delete']);

        //Groups
        Route::get('/groups/{sid}/{cid}', [GroupController::class, 'index']);
        Route::get('/groupstudents/{sid}/{cid}', [GroupController::class, 'students']);
        Route::post('/storegroup', [GroupController::class, 'store']);
        Route::get('/group/{id}', [GroupController::class, 'show']);
        Route::post('/removestudent', [GroupController::class, 'remove']);

        // Guidance
        Route::get('/guidance/{sid}/{cid}', [GuidanceController::class, 'index']);
        // Route::get('/workdonehbys/{sid}/{cid}/{subjid}', [GuidanceController::class, 'workdonehbys']);
        // Route::get('/worktodaybys/{sid}/{cid}/{subid}', [GuidanceController::class, 'worktodaybys']);
        Route::get('/guidance/{id}', [GuidanceController::class, 'show']);
        // Route::get('/wdata/{sid}/{cid}/{subid}', [GuidanceController::class, 'wdata']);
        Route::post('/storeguidance', [GuidanceController::class, 'store']);
        Route::post('/updateguidance', [GuidanceController::class, 'update']);

        // Materials
        Route::get('/materials/{id}', [MaterialController::class, 'index']);
        Route::get('/materialsbyt/{id}', [MaterialController::class, 'materialbyt']);
        // Route::get('/material/{id}', [MaterialController::class, 'show']);
        Route::post('/storeMaterial', [MaterialController::class, 'store']);
        Route::post('/updateMaterial', [MaterialController::class, 'update']);
        Route::get('/delMaterial/{id}', [MaterialController::class, 'delete']);


        //Teachersdesk
        // Lessons
        Route::get('/tdlessons/{subj}', [TeachersdeskController::class, 'lessons']);
        Route::get('/sleaves/{id}', [LeaveController::class, 'sleaves']);
        // Topics
        Route::get('/tdtopics/{lid}', [TeachersdeskController::class, 'topics']);
        Route::get('/sleaves/{id}', [LeaveController::class, 'sleaves']);

        // SubTopics
        Route::get('/tdsubtopics/{tid}', [TeachersdeskController::class, 'subtopics']);

        // Materials
        Route::get('/tdmaterials/{tid}', [TeachersdeskController::class, 'materials']);

        // Materials
        Route::get('/tdexamples/{tid}', [TeachersdeskController::class, 'examples']);

        // Videos
        Route::get('/tdvideos/{tid}', [TeachersdeskController::class, 'videos']);

        // Notes
        Route::get('/tdnotes/{tid}', [TeachersdeskController::class, 'notes']);



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

        // Event
        Route::post('/getStudentEvents', [EventController::class, 'getStudentEvents']);

        // // Home
        Route::get('/home/{id}', [HomeController::class, 'index']);
        // Route::get('/finalreport', [HomeController::class, 'final']);

    });

});


// Student Routes
Route::prefix('1')->group(function () {

    Route::post('student/login', [LoginController::class, 'studentlogin']);
    Route::post('student/logout', [LoginController::class, 'studentlogout']);

    Route::middleware(['auth:sanctum'])->prefix('student')->group(function () {

        // Students
        // Route::get('/students/{id}', [StudentController::class, 'index']);
        // Route::get('/students/{sid}/{cid}', [StudentController::class, 'studentsbys']);
        Route::get('/student/{id}', [StudentController::class, 'show']);
        // Route::post('/storestudent', [StudentController::class, 'store']);
        // // Route::post('/storestudent', [StudentController::class, 'storeMulti']);
        // Route::post('/updatestudent', [StudentController::class, 'update']);
        // Route::get('/studentdel/{id}', [StudentController::class, 'delete']);
        // Route::post('/studentreport', [StudentController::class, 'report']);

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
        // Route::get('/attendsbyc/{sid}/{cid}/{slot}', [AttendanceController::class, 'attendsbyc']);
        // Route::get('/attends/{id}', [AttendanceController::class, 'show']);
        // Route::post('/storeattend', [AttendanceController::class, 'store']);
        // Route::post('/updateattend', [AttendanceController::class, 'update']);
        // Route::get('/delattend/{id}', [AttendanceController::class, 'delete']);

        // Homework
        Route::get('/dailydata/{sid}/{cid}/{stid}', [HomeworkController::class, 'dailyStData']);
        Route::get('/work/{sid}/{cid}', [HomeworkController::class, 'index']);
        Route::get('/workbyc/{sid}/{cid}', [HomeworkController::class, 'workbyc']);
        Route::get('/worktoday/{sid}/{cid}', [HomeworkController::class, 'worktoday']);
        Route::get('/worktodaybys/{sid}/{cid}/{suid}', [HomeworkController::class, 'worktodaybys']);
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
        // Route::get('/leaves/{id}', [LeaveController::class, 'index']);
        // Route::get('/leavesbyc/{id}/{cate}', [LeaveController::class, 'leavesbyc']);
        // Route::get('/sleaves/{id}', [LeaveController::class, 'sleaves']);
        // Route::get('/leave/{id}', [LeaveController::class, 'show']);
        // Route::post('/storeleave', [LeaveController::class, 'store']);
        // Route::post('/updateleave', [LeaveController::class, 'update']);
        // Route::get('/leavedel/{id}', [LeaveController::class, 'delete']);

        // Schedule
        Route::get('/timetables/{sid}/{cid}', [ScheduleController::class, 'index']);
        Route::get('/timetable/{sid}/{cid}/{day}', [ScheduleController::class, 'timebyday']);
        Route::get('/time/{id}', [ScheduleController::class, 'show']);
        // Route::post('/storetime', [ScheduleController::class, 'store']);
        // Route::post('/updatetime', [ScheduleController::class, 'update']);
        // Route::get('/deltime/{id}', [ScheduleController::class, 'delete']);

        // News
        // Route::get('/news/{id}', [NewsController::class, 'index']);
        // Route::get('/newsbyt/{id}', [NewsController::class, 'newsbyt']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        // Route::post('/storenews', [NewsController::class, 'store']);
        // Route::post('/updatenews', [NewsController::class, 'update']);
        // Route::get('/delnews/{id}', [NewsController::class, 'delete']);

        // Notice
        // Route::get('/snotices/{id}', [NoticeController::class, 'snotices']);
        // Route::get('/snotice/{id}', [NoticeController::class, 'snotice']);
        // Route::get('/notices/{id}', [NoticeController::class, 'index']);
        // Route::get('/noticebys/{id}', [NoticeController::class, 'villagebyd']);
        // Route::post('/storenotice', [NoticeController::class, 'store']);
        // Route::post('/updatenotice', [NewsController::class, 'update']);
        // Route::get('/delnotice/{id}', [NewsController::class, 'delete']);

        // Pages
        Route::get('/pages/{id}', [PageController::class, 'index']);
        Route::get('/pages/{app}/{name}', [PageController::class, 'singlepage']);
        Route::get('/pagesbys/{id}', [PageController::class, 'villagebyd']);

        // Guidance
        Route::get('/guidancebyt/{hid}/{type}', [GuidanceController::class, 'guidanceByType']);


        // // Home
        Route::get('/home/{id}', [HomeController::class, 'index']);
        // Route::get('/finalreport', [HomeController::class, 'final']);

    });

});


// Trainer Routes
Route::prefix('1')->group(function () {

    Route::post('trainer/login', [LoginController::class, 'trainlogin']);
    Route::post('trainer/logout', [LoginController::class, 'trainlogout']);

    Route::middleware(['auth:trainer'])->prefix('trainer')->group(function () {

        // Students
        Route::get('/students/{cid}', [StudentController::class, 'studentsbyc']);
        // Route::get('/students/{sid}/{cid}', [StudentController::class, 'studentsbys']);
        Route::get('/student/{id}', [StudentController::class, 'show']);
        Route::post('/addstudent', [StudentController::class, 'addstudents']);
        Route::get('/studentsbysport/{id}', [StudentController::class, 'studentsBySport']);
        Route::get('/sports/{pid}/students/{sid}', [StudentController::class, 'removeStudent']);

        // Route::post('/storestudent', [StudentController::class, 'storeMulti']);
        // Route::post('/updatestudent', [StudentController::class, 'update']);
        // Route::get('/studentdel/{id}', [StudentController::class, 'delete']);
        // Route::post('/studentreport', [StudentController::class, 'report']);

        // Teachers
        Route::get('/teachers/{id}', [TeacherController::class, 'index']);
        Route::get('/teachersbyd/{id}', [TeacherController::class, 'Teacherbyd']);
        Route::get('/teacher/{id}', [TeacherController::class, 'show']);
        // Route::post('/storeteacher', [TeacherController::class, 'store']);
        // Route::post('/updateteacher', [TeacherController::class, 'update']);
        // Route::get('/cndel/{id}', [TeacherController::class, 'delete']);


        // Sports
        Route::get('/sports/{id}', [SportController::class, 'index']);
        Route::get('/sportsbyt/{id}', [SportController::class, 'sportsbyt']);
        Route::get('/sportstoday/{id}', [SportController::class, 'sportstoday']);
        Route::get('/sport/{id}', [SportController::class, 'show']);
        Route::get('/groupbystudents/{id}', [SportController::class, 'groupByStudents']);
        Route::post('/savestudents', [SportController::class, 'registerStudents']);
        // Route::post('/', [SportController::class, 'registerStudents']);
         Route::get('filterstudents/{sid}/{pid}', [SportController::class, 'filterStudents']);


        // Sport Attendance

        Route::group(['prefix' => 'sportsattend'], function () {
            Route::get('{pid}/{sid}', [SportAttendanceController::class, 'index']);
            ;
            //     Route::post('create', [SportController::class, 'create']);
            //     Route::get('today/{sid}', [SportController::class, 'eventbys']);
        });
        Route::get('presentstudents/{pid}/{sid}', [SportAttendanceController::class, 'presentStudents']);
        

        Route::group(['prefix' => 'sport'], function () {
            // Route::get('{sid}/{pid}', [SportAttendanceController::class, 'index']);
            // Route::post('create', [EventController::class, 'create']);
            // Route::get('today/{sid}', [EventController::class, 'eventbys']);
            Route::post('/store', [SportAttendanceController::class, 'store']);
        });


        // Route::post('/updatesubject', [SubjectController::class, 'update']);

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
        // Route::get('/attendsbyc/{sid}/{cid}/{slot}', [AttendanceController::class, 'attendsbyc']);
        // Route::get('/attends/{id}', [AttendanceController::class, 'show']);
        // Route::post('/storeattend', [AttendanceController::class, 'store']);
        // Route::post('/updateattend', [AttendanceController::class, 'update']);
        // Route::get('/delattend/{id}', [AttendanceController::class, 'delete']);

        // Homework
        Route::get('/dailydata/{sid}/{cid}/{stid}', [HomeworkController::class, 'dailyStData']);
        Route::get('/work/{sid}/{cid}', [HomeworkController::class, 'index']);
        Route::get('/workbyc/{sid}/{cid}', [HomeworkController::class, 'workbyc']);
        Route::get('/worktoday/{sid}/{cid}', [HomeworkController::class, 'worktoday']);
        Route::get('/worktodaybys/{sid}/{cid}/{suid}', [HomeworkController::class, 'worktodaybys']);
        Route::get('/workweek/{sid}/{cid}', [HomeworkController::class, 'workweek']);
        Route::get('/work/{id}', [HomeworkController::class, 'show']);
        Route::post('/workdone/{id}', [HomeworkController::class, 'workdone']);
        // Route::post('/storework', [HomeworkController::class, 'store']);
        // Route::post('/updatework', [HomeworkController::class, 'update']);
        // Route::get('/delwork/{id}', [HomeworkController::class, 'delete']);

        Route::get('/notdonestudents/{id}', [HomeworkController::class, 'notdoneStudents']);

        // Event
        Route::group(['prefix' => 'event'], function () {

            Route::get('{sid}', [EventController::class, 'show']);
            Route::post('/store', [EventController::class, 'store']);

            Route::post('/update', [EventController::class, 'update']);
            Route::get('/delete/{id}', [EventController::class, 'delete']);

            // Participant
            Route::get('participants/{eid}', [EventParticipantController::class, 'index']);
            Route::post('participant/store', [EventParticipantController::class, 'store']);

            // Highlight
             Route::get('highlight/{hid}', [EventHighlightController::class, 'show']);
            Route::get('highlights/{eid}', [EventHighlightController::class, 'index']);
            Route::post('highlight/store', [EventHighlightController::class, 'store']);
            Route::post('highlight/update', [EventHighlightController::class, 'update']);

            // Note
            Route::get('note/{eid}', [EventNoteController::class, 'index']);
            Route::get('notes/{type}/{eid}', [EventNoteController::class, 'notesbytype']);
            Route::post('note/store', [EventNoteController::class, 'store']);

             // Video
            Route::get('videos/{eid}', [EventVideoController::class, 'index']);
            Route::post('video/store', [EventVideoController::class, 'store']);
        });
        // Events
        Route::group(['prefix' => 'events'], function () {
            Route::get('{sid}', [EventController::class, 'index']);
            Route::post('create', [EventController::class, 'create']);
            Route::get('today/{sid}', [EventController::class, 'eventbys']);
        });



        //ExamResult
        Route::get('/examresultsbyst/{eid}/{sid}', [ExamResultController::class, 'resultsbyst']);

        // Leaves
        // Route::get('/leaves/{id}', [LeaveController::class, 'index']);
        // Route::get('/leavesbyc/{id}/{cate}', [LeaveController::class, 'leavesbyc']);
        // Route::get('/sleaves/{id}', [LeaveController::class, 'sleaves']);
        // Route::get('/leave/{id}', [LeaveController::class, 'show']);
        // Route::post('/storeleave', [LeaveController::class, 'store']);
        // Route::post('/updateleave', [LeaveController::class, 'update']);
        // Route::get('/leavedel/{id}', [LeaveController::class, 'delete']);

        // Schedule
        Route::get('/timetables/{pid}/{sid}', [SportTimetableController::class, 'index']);
        // Route::get('/timetable/{sid}/{cid}/{day}', [ScheduleController::class, 'timebyday']);
        // Route::get('/time/{id}', [ScheduleController::class, 'show']);
        Route::post('/storetimetable', [SportTimetableController::class, 'store']);
        // Route::post('/updatetime', [ScheduleController::class, 'update']);
        // Route::get('/deltime/{id}', [ScheduleController::class, 'delete']);

        // News
        // Route::get('/news/{id}', [NewsController::class, 'index']);
        // Route::get('/newsbyt/{id}', [NewsController::class, 'newsbyt']);
        // Route::get('/news/{id}', [NewsController::class, 'show']);
        // Route::post('/storenews', [NewsController::class, 'store']);
        // Route::post('/updatenews', [NewsController::class, 'update']);
        // Route::get('/delnews/{id}', [NewsController::class, 'delete']);

        // Notice
        // Route::get('/snotices/{id}', [NoticeController::class, 'snotices']);
        // Route::get('/snotice/{id}', [NoticeController::class, 'snotice']);
        // Route::get('/notices/{id}', [NoticeController::class, 'index']);
        // Route::get('/noticebys/{id}', [NoticeController::class, 'villagebyd']);
        // Route::post('/storenotice', [NoticeController::class, 'store']);
        // Route::post('/updatenotice', [NewsController::class, 'update']);
        // Route::get('/delnotice/{id}', [NewsController::class, 'delete']);

        // Pages
        Route::get('/pages/{id}', [PageController::class, 'index']);
        Route::get('/pages/{app}/{name}', [PageController::class, 'singlepage']);
        Route::get('/pagesbys/{id}', [PageController::class, 'villagebyd']);

        // Guidance
        Route::get('/guidancebyt/{hid}/{type}', [GuidanceController::class, 'guidanceByType']);


        // // Home
        Route::get('/home/{id}', [HomeController::class, 'index']);
        // Route::get('/finalreport', [HomeController::class, 'final']);

    });

});

