<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Grades;
use App\Models\Absences;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\SchoolSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AbsencesController extends Controller
{
    public function showAbsences($student_id = null)
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
        $absences = Absences::where($conditions)->get();
        if (count($absences)) {
            foreach ($absences as &$absence) {
                $absence->subject = SchoolSubjects::where("id", $absence->subject_id)->first();
                $absence->student = Students::where("id", $absence->student_id)->first();
                $absence->teacher = Teachers::where("id", $absence->teacher_id)->first();
            }
        }
        return view('laravel-examples/absences', ['absences' => $absences]);
    } 

    public function createNewAbsence(Request $request) {
        $attributes = request()->validate([
            'date' => ['required'],  
            'teacher' => ['required', 'max:50'],
        ]);
        $teacher_obj = Teachers::where("id", $request->teacher)->first();
        $subject_id = $teacher_obj->subject_id;
        $student = Students::where("id", $request->student_id)->first();

        $data_to_insert = [
            'date' => $request->date,
            'teacher_id' => $request->teacher,
            'subject_id' => $subject_id,
            'student_id' => $student->id,
        ];
        Absences::create($data_to_insert);
        session()->flash('success', 'Absence '.$request->date.' created successfully for '.$student->name.' by '.$teacher_obj->name.'.');
        return redirect()->to('absences');
    }

    public function showLeaveAbsence($student_id = null) {
        $student = Students::where("id", $student_id)->first();
        $teachers = Teachers::get();

        return view('laravel-examples/show-leave-absence', ['student' => $student, 'teachers' => $teachers]);
    }

    public function deleteAbsence($absence_id = null)
    {
        $absence = Absences::where("id", $absence_id)->first();
        if (isset($absence->student_id)) {
            $student = Students::where("id", $absence->student_id)->first();
        }
        
        if ($absence) {
            $absence->delete();
            if ($student) {
                $txt = 'Absence '.$absence->date.' for student '.$student->name.' deleted successfully.';
            } else {
                $txt = 'Absence '.$absence->date.' deleted successfully.';
            }
            session()->flash('success', $txt);
        }
        return redirect()->to('absences');
    }

}
