<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Grades;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\SchoolSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GradesController extends Controller
{
    public function showGrades($student_id = null)
    {
        $conditions = [];
        if (auth()->user()->account_type == "student") {
            $conditions['student_id'] = auth()->user()->external_user_id;
        } elseif (auth()->user()->account_type == "teacher") {
            $conditions['teacher_id'] = auth()->user()->external_user_id;
        }
        if($student_id) {
            $conditions['student_id'] = $student_id;
        }
        $grades = Grades::where($conditions)->get();
        if (count($grades)) {
            foreach ($grades as &$grade) {
                $grade->subject = SchoolSubjects::where("id", $grade->subject_id)->first();
                $grade->student = Students::where("id", $grade->student_id)->first();
                $grade->teacher = Teachers::where("id", $grade->teacher_id)->first();
            }
        }
        return view('laravel-examples/grades', ['grades' => $grades]);
    } 

    public function createNewGrade(Request $request) {
        $attributes = request()->validate([
            'grade' => ['required', 'max:2'],   // Ensure grade is required and max length of 2 characters (e.g., 'A', 'B', 'C')
            'teacher' => ['required', 'max:50'], // Ensure teacher is required and max length of 50 characters
            'reason' => ['required', 'string', 'max:255'],  // Ensure reason is required, a string, and max length of 255 characters
        ]);
        $teacher_obj = Teachers::where("id", $request->teacher)->first();
        $subject_id = $teacher_obj->subject_id;
        $student = Students::where("id", $request->student_id)->first();

        $data_to_insert = [
            'grade' => $request->grade,
            'teacher_id' => $request->teacher,
            'subject_id' => $subject_id,
            'student_id' => $student->id,
            'reason' => $request->reason
        ];
        Grades::create($data_to_insert);
        session()->flash('success', 'Grade '.$request->grade.' created successfully for '.$student->name.' by '.$teacher_obj->name.'.');
        return redirect()->to('grades');
    }

    public function leaveParentOpinion(Request $request) {
        $attributes = request()->validate([
            'opinion' => ['required', 'string', 'max:255'],  
            'parent_id' => ['required'],
            'grade_id' => ['required'],
        ]);
        $parent = Parents::where("id", $request->parent_id)->first();
        $grade = Grades::where("id", $request->grade_id)->first();
        $student = Students::where("id", $grade->student_id)->first();

        $full_opinion = $request->opinion . " by parent ".$parent->name;
        $data_to_update = [
            'parent_opinion' => $full_opinion . " - ". Carbon::now()
        ];
        Grades::where("id", $request->grade_id)->update($data_to_update);
        session()->flash('success', 'The opinion for '.$student->name.' with grade '.$grade->grade.' was leaved.');
        return redirect()->to('grades');
    }

    public function showLeaveGrade($student_id = null) {
        $student = Students::where("id", $student_id)->first();
        $teachers = Teachers::get();

        return view('laravel-examples/show-leave-grade', ['student' => $student, 'teachers' => $teachers]);
    }

    public function showLeaveOpinion(Request $request) {
        $grade_id = $request->grade_id;
        $parent_id = $request->parent_id;
        $grade = Grades::where("id", $grade_id)->first();
        $parent = Parents::where("id", $parent_id)->first();
        $student = Students::where("id", $grade->student_id)->first();

        return view('laravel-examples/show-leave-opinion', ['grade' => $grade, 'student' => $student, 'parent' => $parent]);
    }

    public function deleteGrade($grade_id = null)
    {
        $grade = Grades::where("id", $grade_id)->first();
        if (isset($grade->student_id)) {
            $student = Students::where("id", $grade->student_id)->first();
        }
        
        if ($grade) {
            $grade->delete();
            if ($student) {
                $txt = 'Grade '.$grade->grade.' for student '.$student->name.' deleted successfully.';
            } else {
                $txt = 'Grade '.$grade->grade.' deleted successfully.';
            }
            session()->flash('success', $txt);
        }
        return redirect()->to('grades');
    }

}
