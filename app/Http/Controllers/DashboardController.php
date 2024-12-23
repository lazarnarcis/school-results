<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Absences;
use App\Models\Grades;
use App\Models\Parents;
use App\Models\Teachers;
use App\Models\SchoolSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function showDashboard () {
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

        $parents = Parents::get();
        if (count($parents)) {
            foreach ($parents as &$parent) {
                $student = Students::where("id", $parent->student_id)->first();
                $parent->student = $student;
            }
        }

        $teachers = Teachers::get();
        if (count($teachers)) {
            foreach ($teachers as &$teacher) {
                $school_subject = SchoolSubjects::where("id", $teacher->subject_id)->first();
                $teacher->school_subject = $school_subject;
            }
        }

        $annual_average = 0;
        $tav = 0;
        $ctav = 0;

        if (count($students)) {
            foreach ($students as $st) {
                if ($st->annual_average != "No grades") {
                    $tav += $st->annual_average;
                    $ctav++;
                }
            }
            $annual_average = $tav / $ctav;
            $annual_average = round($annual_average, 2);
        }

        if (auth()->user()->account_type == "student") {
            if (count($students)) {
                foreach ($students as $sty) {
                    if (auth()->user()->external_user_id == $sty->id) {
                        $annual_average = $sty->annual_average;
                    }
                }
            }
        }

		return view('dashboard', [
            'total_students' => count($students), 
            'total_parents' => count($parents),
            'total_teachers' => count($teachers),
            'annual_average' => $annual_average
        ]);
	} 

}
