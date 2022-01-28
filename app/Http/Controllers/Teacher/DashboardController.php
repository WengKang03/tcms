<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Timetable;
use App\Models\Material;
use App\Models\Attendance;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function teacher_view(Request $request, $id)
    {
        
        $teachers = DB::table('teacher_record')
        ->where('teacher_id',$id)
        ->first();
        
        return view('teacher.teacher-view-personal-information')->with('teachers',$teachers);
    }


   public function teacher_edit(Request $request, $id)
   {
       $teachers = DB::table('teacher_record')
        ->where('teacher_id',$id)
        ->first();

       return view('teacher.teacher-modify-personal-information')->with('teachers',$teachers);
   }


   
   public function teacher_update(Request $request, $id)
   {
       
       $teachers = Teacher::find($id);

       
       $validatedData = $request->validate([
           'username' => 'required|max:191',
           'phone' => 'required|max:191',
           'email' => 'required|max:191',
           'gender' => 'required',
           'subject' => 'required|max:191',
           'password' => 'required|min:8|max:191',
       ]);

       if($request->hasfile('photo'))
        {
            /* Get filename with the extension */
            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            /* Get just filename */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            /* Get just extension */
            $extension = $request->file('photo')->getClientOriginalExtension();

            /* filename to store*/
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('public/teacher_images', $fileNameToStore);
        }

       
       $teachers->teacher_name  = $request->input('username');
       $teachers->teacher_phone = $request->input('phone');
       $teachers->teacher_email = $request->input('email');
       $teachers->teacher_gender = $request->input('gender');
       $teachers->teacher_subject = $request->input('subject');
       if($request->hasfile('photo')){
        $teachers->teacher_photo = $fileNameToStore;
    }
       $teachers->update();


       
       $users = User::find($id);

       
       $users->name = $request->input('username');
       $users->phone = $request->input('phone');
       $users->email = $request->input('email');
       $users->password = Hash::make($request->input('password'));
       $users->update();
       
       return redirect('teacher-modify-personal-information/'. $id)->with('status','Your Data is Updated');
   }

   //Timetable
   public function timetable_list(){

    $timetable = DB::table('timetable_record')
    ->orderBy('timetable_id','desc')
    ->get();

    return view('teacher.teacher-view-timetable')->with('timetable',$timetable);
}


    // Material
    public function material_list(){

        $materials = DB::table('material_record')
        ->orderBy('material_id','desc')
        ->get();

        return view('teacher.teacher-manage-material-information')->with('materials',$materials);
    }

    public function material_create(Request $request){

        $create_material = new Material;
        
        /* Validate input in admin page */
        $validatedData = $request->validate([
            'grade' => 'required|max:191',
            'year' => 'required|max:191',
            'subject' => 'required|max:191',
            'desc' => 'required|max:191',
            'created_by' => 'required|max:191',
            'file' => 'required|nullable|mimes:csv,txt,xlx,xls,pdf,docx|max:191',
        ]);

        $create_material->material_grade = $request->input('grade');
        $create_material->material_year = $request->input('year');
        $create_material->material_subject = $request->input('subject');
        $create_material->material_desc = $request->input('desc');
        $create_material->created_by = $request->input('created_by');
        if($request->hasfile('file'))
        {
            /* Get filename with the extension */
            $filenameWithExt = $request->file('file')->getClientOriginalName();

            /* Get just filename */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            /* Get just extension */
            $extension = $request->file('file')->getClientOriginalExtension();

            /* filename to store*/
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/material_file', $fileNameToStore);
        
        }
        $create_material->material_file = $fileNameToStore;
        
        $create_material->save();

        return redirect('teacher.teacher-manage-material-information')->with('status','Material data is updated');


    }

    public function material_edit(Request $request, $id){

        $materials = DB::table('material_record')
        ->where('material_id', $id)
        ->first();

        return view('teacher.teacher-modify-material-information')->with('materials',$materials);
    }

    public function material_update(Request $request, $id){

        $materials = Material::find($id);

        $validatedData = $request->validate([
            'grade' => 'required|max:191',
            'year' => 'required|max:191',
            'subject' => 'required|max:191',
            'desc' => 'required|max:191',
            'created_by' => 'required|max:191',
            'file' => 'required|nullable|mimes:csv,txt,xlx,xls,pdf,docx|max:191',
        ]);


        if($request->hasfile('file'))
        {
            /* Get filename with the extension */
            $filenameWithExt = $request->file('file')->getClientOriginalName();

            /* Get just filename */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            /* Get just extension */
            $extension = $request->file('file')->getClientOriginalExtension();

            /* filename to store*/
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('file')->storeAs('public/material_file', $fileNameToStore);
        }

        $materials->material_grade = $request->input('grade');
        $materials->material_year = $request->input('year');
        $materials->material_subject = $request->input('subject');
        $materials->material_desc = $request->input('desc');
        $materials->created_by = $request->input('created_by');
        if($request->hasfile('file')){
            $materials->material_file = $fileNameToStore;
        }
        $materials->update();

        return redirect('teacher-modify-material-information/'. $id)->with('status','Material Data is Updated');
    }

    public function material_delete($id)
    {
        $materials = DB::table('material_record')
        ->where('material_id', $id)
        ->delete();

        return redirect('teacher.teacher-manage-material-information')->with('status','Teaching Material data is Deleted');
    }



    //Attendance
    public function attendance_record()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data =  array();

        $data['teachers'] = DB::table('attendance_record')
        ->where('teacher_id', $userid)
        ->orderBy('created_at','desc')
        ->paginate(10);

        return view('teacher.teacher-manage-attendance',['data'=>$data]);

    }


    public function create_attendance(Request $request)
    {

        $create_attendance = new Attendance;

        $validatedData = $request->validate([
            'grade' => 'required|max:191',
            'year' => 'required|max:191',
            'subject' => 'required|max:191',
            'status' => 'required|max:191',
            'reason' => 'required|max:191',
        ]);

        $teacher_id = $request->input('teacher_id');
        $current_date = $request->input('current_date');

            $create_attendance->teacher_id = $request->input('teacher_id');
            $create_attendance->attendance_grade = $request->input('grade');
            $create_attendance->attendance_year = $request->input('year');
            $create_attendance->attendance_subject = $request->input('subject');
            $create_attendance->status = $request->input('status');
            $create_attendance->reason = $request->input('reason');
            $create_attendance->save();

            return redirect('/teacher.teacher-manage-attendance')->with('status','New Attendance record is Added');

    }
  
    public function attendance_edit(Request $request, $id)
    {
        $attendance_record = DB::table('attendance_record')
        ->where('attendance_id', $id)
        ->first();

        return view('teacher.teacher-modify-attendance')->with('attendance_record',$attendance_record);
    }

  
    public function attendance_update(Request $request, $id)
    {
       
        $attendance_record = Attendance::find($id);

        $validatedData = $request->validate([
            'grade' => 'required|max:191',
            'year' => 'required|max:191',
            'subject' => 'required|max:191',
            'status' => 'required|max:191',
            'reason' => 'required|max:191',
        ]);

        $attendance_record->attendance_grade= $request->input('grade');
        $attendance_record->attendance_year = $request->input('year');
        $attendance_record->attendance_subject = $request->input('subject');
        $attendance_record->status = $request->input('status');
        $attendance_record->reason = $request->input('reason');
        $attendance_record->update();

        return redirect('teacher-modify-attendance/'. $id)->with('status','Your attendance record is Edited');

    }

    public function teacher_data(){

        $teacher = Auth::user();
        $teacher_id = $teacher->id;

        $timetable_count = DB::table('timetable_record')
        ->count();

        $material_count = DB::table('material_record')
        ->count();

        $data =  array();

        $data['total_timetable'] = $timetable_count;

        $data['total_material'] = $material_count;

        return view('teacher.teacher-dashboard',['data'=>$data]);
    }


}

