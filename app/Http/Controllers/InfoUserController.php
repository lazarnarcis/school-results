<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use App\Models\Students;
use App\Models\Parents;
use App\Models\Teachers;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
        ]);
        if($request->get('email') != Auth::user()->email)
        {
            if(env('IS_DEMO') && Auth::user()->id == 1)
            {
                return redirect()->back()->withErrors(['msg2' => 'You are in a demo version, you can\'t change the email address.']);
                
            }
            
        }
        else{
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        }
        
        
        User::where('id',Auth::user()->id)
        ->update([
            'name'    => $attributes['name'],
            'email' => $attributes['email'],
        ]);

        if (Auth::user()->account_type != "admin") {
            switch (Auth::user()->account_type) {
                case 'teacher':
                    Teachers::where("id", Auth::user()->external_user_id)->update(['name'=>$attributes['name'],'email'=>$attributes['email']]);
                    break;

                case 'student':
                    Students::where("id", Auth::user()->external_user_id)->update(['name'=>$attributes['name'],'email'=>$attributes['email']]);
                    break;

                case 'parent':
                    Parents::where("id", Auth::user()->external_user_id)->update(['name'=>$attributes['name'],'email'=>$attributes['email']]);
                    break;
                
                default: 
                    break;
            }
        }


        return redirect('/user-profile')->with('success','Profile updated successfully');
    }
}
