<?php

use App\Http\Controllers\Admin\studentController;
use App\Http\Controllers\Admin\courseController;
use App\Http\Controllers\Admin\dashboardcontroller;
use App\Http\Controllers\Admin\departmentController;
use App\Http\Controllers\Admin\enrollmentController;
use App\Http\Controllers\Admin\professorController;
use App\Http\Controllers\Auth\authController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية العامة
Route::get('/', [homeController::class,'index'])->name('home.index');
Route::get('/about', [homeController::class,'about'])->name('home.about');
Route::get('/contact', [homeController::class,'contact'])->name('home.contact');

// صفحة تسجيل الدخول للادمن
Route::get('/adminLogin', [authController::class,'adminLogin'])->name('admin.login');
Route::post('/adminLogin', [authController::class,'adminCheckLogin'])->name('admin.adminCheckLogin');

// الصفحات الخاصة بالادمن
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('dashboard', [dashboardcontroller::class,'index'])->name('admin.dashboard');

    // Students
    Route::resource('students', studentController::class)->names([
        'index'=>'admin.students.index',
        'show'=>'admin.students.show',
        'create'=>'admin.students.create',
        'update'=>'admin.students.update',
        'edit'=>'admin.students.edit',
        'store'=>'admin.students.store',
        'destroy'=>'admin.students.destroy'
    ]);

    // Courses
    Route::resource('courses', courseController::class)->names([
        'index'=>'admin.courses.index',
        'show'=>'admin.courses.show',
        'create'=>'admin.courses.create',
        'update'=>'admin.courses.update',
        'edit'=>'admin.courses.edit',
        'store'=>'admin.courses.store',
        'destroy'=>'admin.courses.destroy'
    ]);

    // Professors
    Route::resource('professors', professorController::class)->names([
        'index'=>'admin.professors.index',
        'show'=>'admin.professors.show',
        'create'=>'admin.professors.create',
        'update'=>'admin.professors.update',
        'edit'=>'admin.professors.edit',
        'store'=>'admin.professors.store',
        'destroy'=>'admin.professors.destroy'
    ]);

    // Departments
    Route::resource('departments', departmentController::class)->names([
        'index'=>'admin.departments.index',
        'show'=>'admin.departments.show',
        'create'=>'admin.departments.create',
        'update'=>'admin.departments.update',
        'edit'=>'admin.departments.edit',
        'store'=>'admin.departments.store',
        'destroy'=>'admin.departments.destroy'
    ]);

    // Enrollments
    Route::resource('enrollments', enrollmentController::class)->names([
        'index'=>'admin.enrollments.index',
        'show'=>'admin.enrollments.show',
        'create'=>'admin.enrollments.create',
        'update'=>'admin.enrollments.update',
        'edit'=>'admin.enrollments.edit',
        'store'=>'admin.enrollments.store',
        'destroy'=>'admin.enrollments.destroy'
    ]);
});

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);

Route::get('/courses/{course}/edit', [CourseController::class, 'edit']);
Route::put('/courses/{course}', [CourseController::class, 'update']);

Route::delete('/courses/{course}', [CourseController::class, 'destroy']);




Route::get('/professors', [ProfessorController::class, 'index']);
Route::get('/professors/create', [ProfessorController::class, 'create']);
Route::post('/professors', [ProfessorController::class, 'store']);

Route::get('/professors/{professor}/edit', [ProfessorController::class, 'edit']);
Route::put('/professors/{professor}', [ProfessorController::class, 'update']);

Route::delete('/professors/{professor}', [ProfessorController::class, 'destroy']);