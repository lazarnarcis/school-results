<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\SchoolSubjects;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function showNewSchoolSubject()
    {
        return view('laravel-examples/new-school-subject');
    } 

    public function createNewSubject(Request $request) {
        $attributes = request()->validate([
            'subject' => ['required', 'max:50']
        ]);
        SchoolSubjects::create([
            'subject' => $request->subject,
        ]);
        session()->flash('success', 'Subject '.$request->subject.' created successfully.');
        return redirect()->to('school_subjects');
    }

    public function deleteSubject($subject_id = null)
    {
        $subject = SchoolSubjects::where("id", $subject_id)->first();
        
        if ($subject) {
            $subject->delete();
            session()->flash('success', 'Subject '.$subject->subject.' deleted successfully.');
        }
        return redirect()->to('school_subjects');
    }
}
