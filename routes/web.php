<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SchoolSubjectController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('students', [StudentsController::class, 'showStudents']);
	Route::get('parents', [ParentsController::class, 'showParents']);
	Route::get('teachers', [StudentsController::class, 'showTeachers']);
	Route::get('grades/{student_id?}', [GradesController::class, 'showGrades']);
	Route::get('absences/{student_id?}', [AbsencesController::class, 'showAbsences']);
	Route::get('new-teacher', [TeacherController::class, 'createTeacher'])->name("new-teacher");
	Route::get('show-new-school-subject', [SchoolSubjectController::class, 'showNewSchoolSubject'])->name("show-new-school-subject");
	Route::get('new-student', [StudentsController::class, 'createStudent'])->name("new-student");
	Route::get('new-parent', [ParentsController::class, 'createParent'])->name("new-parent");
	Route::get('delete-teacher/{teacher_id}', [TeacherController::class, 'deleteTeacher'])->name("delete-teacher");
	Route::get('delete-grade/{grade_id}', [GradesController::class, 'deleteGrade'])->name("delete-grade");
	Route::get('delete-absence/{absence_id}', [AbsencesController::class, 'deleteAbsence'])->name("delete-absence");
	Route::get('delete-subject/{subject_id}', [SchoolSubjectController::class, 'deleteSubject'])->name("delete-subject");
	Route::post('create-new-teacher', [TeacherController::class, 'createNewTeacher'])->name("create-new-teacher");
	Route::post('store-grade', [GradesController::class, 'createNewGrade'])->name("store-grade");
	Route::post('store-absence', [AbsencesController::class, 'createNewAbsence'])->name("store-absence");
	Route::post('store-parent-opinion', [GradesController::class, 'leaveParentOpinion'])->name("store-parent-opinion");
	Route::post('create-new-subject', [SchoolSubjectController::class, 'createNewSubject'])->name("create-new-subject");
	Route::post('create-new-student', [StudentsController::class, 'createNewStudent'])->name("create-new-student");
	Route::post('create-new-parent', [ParentsController::class, 'createNewParent'])->name("create-new-parent");
	Route::get('/school_subjects', [StudentsController::class, 'showSchoolSubjects'])->name('school-subjects');
	Route::get('/delete-student/{student_id}', [StudentsController::class, 'deleteStudent'])->name('delete-student');
	Route::get('/delete-parent/{parent_id}', [ParentsController::class, 'deleteParent'])->name('delete-parent');
	Route::get('/show-leave-grade/{student_id}', [GradesController::class, 'showLeaveGrade'])->name('show-leave-grade');
	Route::get('/show-leave-absence/{student_id}', [AbsencesController::class, 'showLeaveAbsence'])->name('show-leave-absence');
	Route::get('show-leave-opinion', [GradesController::class, 'showLeaveOpinion'])->name('show-leave-opinion');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('/teacher-login', function () {
    return view('session/teacher-login-session');
})->name('teacher-login');

Route::get('/student-login', function () {
    return view('session/student-login-session');
})->name('student-login');