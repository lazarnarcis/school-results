<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\Grades;
use App\Models\SchoolSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ParentsController extends Controller
{
    public function showParents()
    {
        $parents = Parents::get();
        if (count($parents)) {
            foreach ($parents as &$parent) {
                $student = Students::where("id", $parent->student_id)->first();
                $parent->student = $student;
            }
        }
        return view('laravel-examples/parents', ['parents' => $parents]);
    }

    public function createParent()
    {
        $students = Students::get();
        return view('laravel-examples/new-parent', ['students' => $students]);
    } 

    public function createNewParent(Request $request) {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'password' => ['required'],
            'student' => ['required']
        ]);
        $parent_id = Parents::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'student_id' => $request->student
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_type' => 'parent',
            'external_user_id' => $parent_id->id
        ]);
        session()->flash('success', 'Parent '.$request->name.' created successfully.');
        return redirect()->to('parents');
    }

    public function deleteParent($parent_id = null)
    {
        $parent = Parents::where("id", $parent_id)->first();
        if ($parent) {
            $parent->delete();
            $student = Students::where("id", $parent->student_id)->first();
            $student->delete();
            $grades = Grades::where("student_id", $student->id)->get();
            if (count($grades)) {
                foreach ($grades as $gr) {
                    $gr->delete();
                }
            }
            session()->flash('success', 'Parent '.$parent->name.', student '.$student->name.' and his grades deleted successfully.');
        }
        return redirect()->to('parents');
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
