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
Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login');
})->name('admin.logout');


// الصفحات الخاصة بالادمن
Route::prefix('admin')->group(function () {

    // Dashboard
   Route::get('admin/dashboard', [DashboardController::class,'index'])
    ->name('admin.dashboard')
    ->middleware('auth:admin');


   

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

Route::get('/admin/enrollments/create', [EnrollmentController::class, 'create'])->name('admin.enrollments.create');
Route::post('/admin/enrollments', [EnrollmentController::class, 'store'])->name('admin.enrollments.store');
Route::get('/admin/enrollments/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('admin.enrollments.edit');

Route::get('/debug-enrollment', function() {
    try {
        $s = \App\Models\Student::first();
        $c = \App\Models\Course::first();
        $p = \App\Models\Professor::first();
        
        if(!$s || !$c || !$p) return response()->json(['error' => "Missing master data. Need at least 1 Student, Course, and Professor."]);

        // Test 1: Normal Create
        $e1 = \App\Models\Enrollment::create([
            'student_id' => $s->id,
            'course_id' => $c->id,
            'professor_id' => $p->id,
            'mark' => 10
        ]);

        // Test 2: Force Save (Manual Assignment)
        $e2 = new \App\Models\Enrollment();
        $e2->student_id = $s->id;
        $e2->course_id = $c->id;
        $e2->professor_id = $p->id;
        $e2->mark = 20;
        $e2->save();

        return response()->json([
            'student_data' => $s,
            'normal_create' => $e1,
            'normal_create_fresh' => $e1->fresh(),
            'force_save' => $e2,
            'force_save_fresh' => $e2->fresh(),
        ]);
    } catch (\Exception $e) {
        return response()->json(['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
    }
});
