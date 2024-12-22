<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\Grades;
use App\Models\SchoolSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TeacherController extends Controller
{
    public function createTeacher()
    {
        $school_subjects = SchoolSubjects::get();
        return view('laravel-examples/new-teacher', ['school_subjects' => $school_subjects]);
    } 

    public function deleteTeacher($teacher_id = null)
    {
        $teacher = Teachers::where("id", $teacher_id)->first();
        if ($teacher) {
            $teacher->delete();
            $grades = Grades::where("teacher_id", $teacher->id)->get();
            if (count($grades)) {
                foreach ($grades as $gr) {
                    $gr->delete();
                }
            }
            session()->flash('success', 'Teacher '.$teacher->name.' and the notes he made deleted successfully.');
        }
        return redirect()->to('teachers');
    }

    public function createNewTeacher(Request $request) {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'subject' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50']
        ]);
        $teacher_id = Teachers::create([
            'name' => $request->name,
            'subject_id' => $request->subject,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'account_type' => 'teacher',
            'external_user_id' => $teacher_id->id
        ]);
        session()->flash('success', 'Teacher '.$request->name.' created successfully.');
        return redirect()->to('teachers');
    }
}
