<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\GuardianController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PrincipalController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SyllabusController;
use App\Http\Controllers\Admin\TeacherController;

Route::middleware(['auth'])
    ->prefix('admram')
    ->group(function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

        Route::name("admin.schools")->middleware(['auth'])->prefix('schools')->group(function () {

            Route::get('/', [SchoolController::class, 'index']);
            Route::get('/add', [SchoolController::class, 'create'])->name('.add');
            Route::post('/store', [SchoolController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [SchoolController::class, 'edit'])->name('.edit');
            Route::post('/update', [SchoolController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [SchoolController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.principals")->middleware(['auth'])->prefix('principals')->group(function () {

            Route::get('/', [PrincipalController::class, 'index']);
            Route::get('/sub/{id}', [PrincipalController::class, 'subprobs'])->name('.sub');;
            Route::post('/prfilter', [PrincipalController::class, 'prfilter'])->name('.prfilter');
            Route::get('/create', [PrincipalController::class, 'create'])->name('.add');
            Route::get('/createsub', [PrincipalController::class, 'createsub'])->name('.addsub');
            Route::post('/store', [PrincipalController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [PrincipalController::class, 'edit'])->name('.edit');
            Route::post('/update', [PrincipalController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [PrincipalController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.syllabus")->middleware(['auth'])->prefix('syllabus')->group(function () {

            Route::get('/', [SyllabusController::class, 'index']);
            Route::get('/create', [SyllabusController::class, 'create'])->name('.add');
            Route::post('/filter', [SyllabusController::class, 'filter'])->name('.filter');
            Route::post('/store', [SyllabusController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [SyllabusController::class, 'edit'])->name('.edit');
            Route::post('/update', [SyllabusController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [SyllabusController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.images")->middleware(['auth'])->prefix('images')->group(function () {

            Route::get('/', [ImageController::class, 'index']);
            Route::get('/select', [ImageController::class, 'select'])->name('.select');
            Route::get('/create', [ImageController::class, 'create'])->name('.add');
            Route::post('/store', [ImageController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [ImageController::class, 'edit'])->name('.edit');
            Route::post('/update', [ImageController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [ImageController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.guardian")->middleware(['auth'])->prefix('guardian')->group(function () {

            Route::get('/', [GuardianController::class, 'index']);
            Route::post('/filter', [GuardianController::class, 'filter'])->name('.filter');
            Route::get('/create', [GuardianController::class, 'create'])->name('.add');
            Route::post('/store', [GuardianController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [GuardianController::class, 'edit'])->name('.edit');
            Route::post('/update', [GuardianController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [GuardianController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.teachers")->middleware(['auth'])->prefix('teachers')->group(function () {

            Route::get('/', [TeacherController::class, 'index']);
            Route::post('/filter', [TeacherController::class, 'filter'])->name('.filter');
            Route::get('/create', [TeacherController::class, 'create'])->name('.add');
            Route::post('/store', [TeacherController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('.edit');
            Route::post('/update', [TeacherController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [TeacherController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.students")->middleware(['auth'])->prefix('students')->group(function () {

            Route::get('/', [StudentController::class, 'index']);
            Route::post('/filter', [StudentController::class, 'filter'])->name('.filter');
            Route::get('/create', [StudentController::class, 'create'])->name('.add');
            Route::post('/store', [StudentController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('.edit');
            Route::post('/update', [StudentController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.news")->middleware(['auth'])->prefix('news')->group(function () {

            Route::get('/', [NewsController::class, 'index']);
            Route::get('/create', [NewsController::class, 'create'])->name('.add');
            Route::post('/store', [NewsController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('.edit');
            Route::post('/update', [NewsController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('.delete');

        });
        Route::name("admin.pages")->middleware(['auth'])->prefix('pages')->group(function () {

            Route::get('/', [PageController::class, 'index']);
            Route::get('/create', [PageController::class, 'create'])->name('.add');
            Route::post('/store', [PageController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [PageController::class, 'edit'])->name('.edit');
            Route::post('/update', [PageController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [PageController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.courses")->middleware(['auth'])->prefix('courses')->group(function () {

            Route::get('/', [CourseController::class, 'index']);
            Route::get('/create', [CourseController::class, 'create'])->name('.add');
            Route::post('/store', [CourseController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('.edit');
            Route::post('/update', [CourseController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('.delete');

        });

        Route::name("admin.subjects")->middleware(['auth'])->prefix('subjects')->group(function () {

            Route::get('/', [SubjectController::class, 'index']);
            Route::get('/create', [SubjectController::class, 'create'])->name('.add');
            Route::post('/store', [SubjectController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('.edit');
            Route::post('/update', [SubjectController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('.delete');

        });

        // Route::name("admin.categories")->middleware(['auth'])->prefix('cates')->group(function () {

        //     Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        //     Route::get('/sub/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'subcates'])->name('.sub');

        //     Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('.add');
        //     Route::get('/createsub', [App\Http\Controllers\Admin\CategoryController::class, 'createsub'])->name('.addsub');

        //     Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('.store');
        //     Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('.edit');
        //     Route::post('/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('.update');
        //     Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('.delete');

        // });

        Route::name("admin.setting")->middleware(['auth'])->prefix('setting')->group(function () {

            Route::get('/', [SettingController::class, 'index']);
            Route::post('/filter', [SettingController::class, 'filter'])->name('.filter');
            Route::get('/create', [SettingController::class, 'create'])->name('.add');
            Route::post('/store', [SettingController::class, 'store'])->name('.store');
            Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('.edit');
            Route::post('/update', [SettingController::class, 'update'])->name('.update');
            Route::get('/delete/{id}', [SettingController::class, 'delete'])->name('.delete');

        });

    });
