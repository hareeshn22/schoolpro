<?php

Route::middleware(['auth'])
            ->prefix('admram')
            ->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

    Route::name("admin.schools")->middleware(['auth'])->prefix('schools')->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\SchoolController::class, 'index']);
        Route::get('/add', [App\Http\Controllers\Admin\SchoolController::class, 'create'])->name('.add');
        Route::post('/store', [App\Http\Controllers\Admin\SchoolController::class, 'store'])->name('.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'edit'])->name('.edit');
        Route::post('/update', [App\Http\Controllers\Admin\SchoolController::class, 'update'])->name('.update');
        Route::delete('/delete/{id}', [App\Http\Controllers\Admin\SchoolController::class, 'delete'])->name('.delete');

    });

    Route::name("admin.problems")->middleware(['auth'])->prefix('problems')->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\ProblemController::class, 'index']);
        Route::get('/sub/{id}', [App\Http\Controllers\Admin\ProblemController::class, 'subprobs'])->name('.sub');;

        Route::get('/create', [App\Http\Controllers\Admin\ProblemController::class, 'create'])->name('.add');
        Route::get('/createsub', [App\Http\Controllers\Admin\ProblemController::class, 'createsub'])->name('.addsub');

        Route::post('/store', [App\Http\Controllers\Admin\ProblemController::class, 'store'])->name('.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProblemController::class, 'edit'])->name('.edit');
        Route::post('/update', [App\Http\Controllers\Admin\ProblemController::class, 'update'])->name('.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\ProblemController::class, 'delete'])->name('.delete');

    });

    Route::name("admin.posts")->middleware(['auth'])->prefix('posts')->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\PostController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('.add');
        Route::post('/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('.edit');
        Route::post('/update', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('.delete');

    });

    Route::name("admin.images")->middleware(['auth'])->prefix('images')->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\ImageController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\Admin\ImageController::class, 'create'])->name('.add');
        Route::post('/store', [App\Http\Controllers\Admin\ImageController::class, 'store'])->name('.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ImageController::class, 'edit'])->name('.edit');
        Route::post('/update', [App\Http\Controllers\Admin\ImageController::class, 'update'])->name('.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\ImageController::class, 'delete'])->name('.delete');

    });

    Route::name("admin.categories")->middleware(['auth'])->prefix('cates')->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
        Route::get('/sub/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'subcates'])->name('.sub');

        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('.add');
        Route::get('/createsub', [App\Http\Controllers\Admin\CategoryController::class, 'createsub'])->name('.addsub');

        Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('.edit');
        Route::post('/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('.delete');

    });

});
