<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function student_edit(Request $request, $id)
    {
        
        $students = DB::table('student_record')
        ->where('student_id',$id)
        ->first();
        
        return view('/student.student-modify-personal-information')->with('students',$students);
    }

    
    public function student_update(Request $request, $id)
    {
        $students = Student::find($id);

        
        $validatedData = $request->validate([
        'username' => 'required|max:191',
        'phone' => 'required|max:191',
        'email' => 'required|max:191',
        'gender' => 'required',
        'grade' => 'required|max:191',
        'year' => 'required|max:191',
        'password' => 'required|min:8|max:191',
        ]);

        if($request->hasfile('photo'))
        {
            
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

           
            $extension = $request->file('photo')->getClientOriginalExtension();

            
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('public/student_images', $fileNameToStore);
        }

        $students->student_name = $request->input('username');
        $students->student_phone = $request->input('phone');
        $students->student_email = $request->input('email');
        $students->student_gender = $request->input('gender');
        $students->student_grade = $request->input('grade');
        $students->student_year = $request->input('year');
        if($request->hasfile('photo')){
            $students->student_photo = $fileNameToStore;
        }
        $students->update();

        $users = User::find($id);

        $users->name = $request->input('username');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->update();
        
        return redirect('student-modify-personal-information/'. $id)->with('status','Your Data is Updated');
    }
}
