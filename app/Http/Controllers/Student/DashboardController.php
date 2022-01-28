<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Timetable;
use App\Models\Subject_Enrol;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function student_view(Request $request, $id)
    {
        
        $students = DB::table('student_record')
        ->where('student_id',$id)
        ->first();
        
        return view('/student.student-view-personal-information')->with('students',$students);
    }
    
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

    //Timetable
    public function timetable_list(){

    $timetable = DB::table('timetable_record')
    ->orderBy('timetable_id','desc')
    ->get();

    return view('student.student-view-timetable')->with('timetable',$timetable);
    }

    //Subejct_enrol

    public function subject_enrol_list(){

        $subject_enrol = DB::table('subject_enrol_record')
        ->orderBy('enrol_id','desc')
        ->get();

        return view('student.student-view-subject-enrol-list')->with('subject_enrol',$subject_enrol);
    }

    public function subject_enrol_create(Request $request)
    {

        $create_subject_enrol = new Subject_Enrol;

        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'grade' => 'required|max:191',
            'year' => 'required|max:191',
            'subject' => 'required|max:191',
        ]);

            $create_subject_enrol->student_name = $request->input('name');
            $create_subject_enrol->enrol_grade = $request->input('grade');
            $create_subject_enrol->enrol_year = $request->input('year');
            $create_subject_enrol->enrol_type = $request->input('subject');
            $create_subject_enrol->save();

            return redirect('student.student-view-subject-enrol-list')->with('status','Your record is Added');

    }

    // Material
    public function material_list(){

        $materials = DB::table('material_record')
        ->orderBy('material_id','desc')
        ->get();

        return view('student.student-view-teaching-material')->with('materials',$materials);
    }

}
