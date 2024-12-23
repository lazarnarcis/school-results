<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Grades;
use App\Models\Teachers;
use App\Models\Parents;
use App\Models\Absences;
use App\Models\SchoolSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StudentsController extends Controller
{
    public function showStudents()
    {
        $students = Students::get();
        if (count($students)) {
            foreach ($students as &$student) {
                $student_grades = Grades::where("student_id", $student->id)->get();
                $all_grades = 0;
                $total_grades = 0;
                if (count($student_grades)) {
                    foreach ($student_grades as $sg) {
                        $all_grades++;
                        $total_grades += $sg->grade; 
                    }
                }

                if ($all_grades != 0) {
                    $student->annual_average = $total_grades / $all_grades;
                    if ($student->annual_average > 5) {
                        $student->annual_average = $student->annual_average;
                    } else {
                        $student->annual_average = $student->annual_average;
                    }
                    $student->annual_average = round($student->annual_average, 2);
                } else {
                    $student->annual_average = "No grades";
                }

                $absences = Absences::where('student_id', $student->id)->get();
                $abss = 0;
                if (count($absences)) {
                    foreach ($absences as $abs) {
                        $abss++;
                    }
                }
                $student->absences = $abss;
            }
        }
        return view('laravel-examples/students', ['students' => $students]);
    }

    public function createStudent()
    {
        $school_subjects = SchoolSubjects::get();
        return view('laravel-examples/new-student', ['school_subjects' => $school_subjects]);
    } 

    public function createNewStudent(Request $request) {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50']
        ]);
        $student_id = Students::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_type' => 'student',
            'external_user_id' => $student_id->id
        ]);
        session()->flash('success', 'Student '.$request->name.' created successfully.');
        return redirect()->to('students');
    }

    public function deleteStudent($student_id = null)
    {
        $student = Students::where("id", $student_id)->first();
        if ($student) {
            $student->delete();
            $parent = Parents::where("student_id", $student_id)->first();
            $parent->delete();
            $grades = Grades::where("student_id", $student_id)->get();
            if (count($grades)) {
                foreach ($grades as $gr) {
                    $gr->delete();
                }
            }
            session()->flash('success', 'Student '.$student->name.', his notes and his parent '.$parent->name.' deleted successfully.');
        }
        return redirect()->to('students');
    }

    public function showTeachers()
    {
        $teachers = Teachers::get();
        if (count($teachers)) {
            foreach ($teachers as &$teacher) {
                $school_subject = SchoolSubjects::where("id", $teacher->subject_id)->first();
                $teacher->school_subject = $school_subject;
            }
        }
        return view('laravel-examples/teachers ', ['teachers' => $teachers]); 
    }

    public function showSchoolSubjects($student_id = NULL) {
        $school_subjects = SchoolSubjects::get();
        return view('laravel-examples/show-school-subjects', ['school_subjects' => $school_subjects]);
    }

    
}
