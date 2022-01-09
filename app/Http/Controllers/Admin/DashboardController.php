<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Timetable;
use App\Models\Attendance;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Year;
use App\Models\Subject_Enrol;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller
{
    
    public function user_list()
    {
        $users = DB::table('users')
        ->orderBy('id','desc')
        ->get();

        return view('admin.admin-user-list')->with('users',$users);
    }

    
    public function user_create(Request $request)
    {

        $create_user = new User;
        
        
        $validatedData = $request->validate([
            'username' => 'required|max:191',
            'phone' => 'required|max:191',
            'usertype' => 'required',
            'email' => 'required|max:191',
            'password' => 'required|min:8|max:191',
        ]);

        
        $create_user->name = $request->input('username');
        $create_user->phone = $request->input('phone');
        $create_user->usertype = $request->input('usertype');
        $create_user->email = $request->input('email');
        $create_user->password = Hash::make($request->input('password'));

        
        $user = Auth::user();
        $creator_id = $user->id;

        
        if($create_user->usertype == "teacher")
        {
            $create_user->save();

            $teacher_record = $create_user->id;

            $create_teacher = new Teacher;
            $create_teacher->teacher_id = $teacher_record;
            $create_teacher->teacher_name = $request->input('username');
            $create_teacher->teacher_phone = $request->input('phone');
            $create_teacher->teacher_email = $request->input('email');
            
            $create_teacher->save();   
        }

        else if($create_user->usertype == "student")
        {
            $create_user->save();

            $student_record = $create_user->id;

            $create_student = new Student;
            $create_student->student_id = $student_record;
            $create_student->student_name = $request->input('username');
            $create_student->student_phone = $request->input('phone');
            $create_student->student_email = $request->input('email');

            $create_student->save();
        }

        else
        {
            $create_user->save();
        }

        return redirect('admin.admin-user-list')->with('status','New user is created');
    }


    
    public function user_edit(Request $request, $id)
    {
        $users = DB::table('users')
        ->where('id',$id)
        ->first();

        return view('admin.admin-modify-user-profile')->with('users',$users);
    }

    
    public function user_update(Request $request, $id)
    {

        
        $users = User::findOrFail($id);
        
       
        $validatedData = $request->validate([
            'username' => 'required|max:191',
            'phone' => 'required|max:191',
            'usertype' => 'required',
            'email' => 'required|max:191',
            'password' => 'required|min:8|max:191',
        ]);
        
        
        $users->name = $request->input('username');
        $users->phone = $request->input('phone');
        $users->usertype = $request->input('usertype');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));

        if($users->usertype == "teacher")
        {

            $teacher = Teacher::find($id);
            
            if($teacher == null)
            {
                $create_teacher = new Teacher;
                $create_teacher->teacherr_id = $id;
                $create_teacher->teacher_name = $request->input('username');
                $create_teacher->teacher_phone = $request->input('phone');
                $create_teacher->teacher_email = $request->input('email');
                
                $create_teacher->save(); 
            }
            else
            {
                $teacher->teacher_name = $request->input('username');
                $teacher->teacher_phone = $request->input('phone');
                $teacher->teacher_email = $request->input('email');
                
                $teacher->update();   
            }

            $users->update();

        }
        
        else if($users->usertype == "student")
        {

            $student = Student::find($id);

            if($student == null)
            {
                $create_student = new Student;
                $create_student->student_id = $id;
                $create_student->student_name = $request->input('username');
                $create_student->student_phone = $request->input('phone');
                $create_student->student_email = $request->input('email');
    
                $create_student->save();
            }
            else
            {
                $student->student_name  = $request->input('username');
                $student->student_phone = $request->input('phone');
                $student->student_email = $request->input('email');
                
                $student->update(); 
            }

            $users->update();

        }
        
        
        else if($users->usertype == "admin")
        {

            $student= Student::find($id);

            if($student != null)
            {
                $student = Student::find($id);
                $student->delete();
            }

            $teacher = Teacher::find($id);

            if($teacher != null)
            {
                $teacher = Teacher::find($id);
                $teacher->delete();
            }

            $users->update();

        }

        return redirect('admin.admin-user-list')->with('status','User data is updated');
    }


    public function user_delete($id)
    {
         $users = User::find($id);

        if($users->usertype == "teacher")
        {
            $teachers = DB::table('teacher_record')
            ->where('teacher_id',$id)
            ->delete();

            $users->delete();
        }

        else if($users->usertype == "student")
        {
            $students = DB::table('student_record')
            ->where('student_id',$id)
            ->delete();

            $users->delete();
        }

        else if($users->usertype == "admin")
        {
            $users = DB::table('users')
            ->where('id',$id)
            ->delete();

            $users->delete();
        }

        return redirect('admin.admin-user-list')->with('status','User data is deleted');

    }


    public function teacher_list()
    {
        $teachers = DB::table('teacher_record')
        ->orderBy('teacher_id','desc')
        ->get();

        return view('admin.admin-manage-teacher')->with('teachers',$teachers);
    }


    public function teacher_edit(Request $request, $id)
    {
        $teachers = DB::table('teacher_record')
        ->where('teacher_id', $id)
        ->first();

        return view('admin.admin-modify-teacher-information')->with('teachers',$teachers);
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

        $teachers->teacher_name  = $request->input('username');
        $teachers->teacher_phone = $request->input('phone');
        $teachers->teacher_email = $request->input('email');
        $teachers->teacher_gender = $request->input('gender');
        $teachers->teacher_subject = $request->input('subject');
        $teachers->update();


        $users = User::find($id);
        $users->name = $request->input('username');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->update();
        
        return redirect('admin.admin-manage-teacher')->with('status','Teacher data is updated');
    }


    public function teacher_delete($id)
    {
        $users = DB::table('users')
        ->where('id', $id)
        ->delete();

        $teachers = DB::table('teacher_record')
        ->where('teacher_id', $id)
        ->delete();

        return redirect('admin.admin-manage-teacher')->with('status','Teacher data is Deleted');

    }


    public function student_list()
    {
        $students = DB::table('student_record')
        ->orderBy('student_id','desc')
        ->get();

        return view('admin.admin-manage-student')->with('students',$students);
    }


    public function student_edit(Request $request, $id)
    {
        $students = DB::table('student_record')
        ->where('student_id',$id)
        ->first();

        return view('admin.admin-modify-student-information')->with('students',$students);
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

        $students->student_name = $request->input('username');
        $students->student_phone = $request->input('phone');
        $students->student_email = $request->input('email');
        $students->student_gender = $request->input('gender');
        $students->student_grade = $request->input('grade');
        $students->student_year = $request->input('year');
        $students->update();

        $users = User::find($id);
        $users->name = $request->input('username');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->update();

        return redirect('admin.admin-manage-student')->with('status','Student data is edited');

    }


    public function student_delete($id)
    {
        $users = DB::table('users')
        ->where('id', $id)
        ->delete();

        $students = DB::table('student_record')
        ->where('student_id', $id)
        ->delete();

        return redirect('admin.admin-manage-student')->with('status','Student data is deleted');

    }
    

    public function admin_data(){

        $admin = Auth::user();
        $admin_id = $admin->id;

        $user_count = DB::table('users')
        ->count();

        $teacher_count = DB::table('teacher_record')
        ->count();

        $student_count = DB::table('student_record')
        ->count();

        $timetable_count = DB::table('timetable_record')
        ->count();

        $data =  array();

        $data['total_user'] = $user_count;

        $data['total_teacher'] = $teacher_count;

        $data['total_student'] = $student_count;

        $data['total_timetable'] = $timetable_count;

        return view('admin.admin-dashboard',['data'=>$data]);
    }
     
    //timetable
    public function timetable_list(){

        $timetable = DB::table('timetable_record')
        ->orderBy('timetable_id','desc')
        ->get();


        return view('admin.admin-manage-user-timetable',compact('timetable'));
    }

    public function timetable_create(Request $request){

        $create_timetable = new Timetable;
        
        /* Validate input in admin page */
        $validatedData = $request->validate([
            'usertype' => 'required',
            'grade' => 'required|max:191',
            'year' => 'required|max:191',
            'image' => 'required|nullable|mimes:jpeg,png,jpg,gif,svg|max:191',
        ]);

        $create_timetable->usertype = $request->input('usertype');
        $create_timetable->timetable_grade = $request->input('grade');
        $create_timetable->timetable_year = $request->input('year');
        if($request->hasfile('image'))
        {
            /* Get filename with the extension */
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            /* Get just filename */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            /* Get just extension */
            $extension = $request->file('image')->getClientOriginalExtension();

            /* filename to store*/
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/timetable_image', $fileNameToStore);
        
        }
        
        $create_timetable->save();

        return redirect('/admin.admin-manage-user-timetable')->with('status','User data is updated');


    }

    public function timetable_edit(Request $request, $id){

        $timetables = DB::table('timetable_record')
        ->where('timetable_id', $id)
        ->first();
        
        return view('admin.admin-modify-user-timetable')->with('timetables',$timetables);
    }

    public function timetable_update(Request $request, $id){

        $timetables = Timetable::find($id);

        $validatedData = $request->validate([
            'usertype' => 'required',
            'grade' => 'required|max:191',
            'year' => 'required|max:191',
            'image' => 'required|nullable|mimes:jpeg,png,jpg,gif,svg|max:191',
        ]);

        if($request->hasfile('image'))
        {
            /* Get filename with the extension */
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            /* Get just filename */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            /* Get just extension */
            $extension = $request->file('image')->getClientOriginalExtension();

            /* filename to store*/
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/timetable_image', $fileNameToStore);
        }

        $timetable->usertype = $request->input('usertype');
        $timetables->timetable_grade = $request->input('grade');
        $timetables->timetable_year = $request->input('year');
        if($request->hasfile('image')){
            $timetable->timetable_image = $fileNameToStore;
        }
        $timetables->update();

        return redirect('admin-manage-user-timetable/'. $id)->with('status','Your Data is Updated');
    }

    public function timetable_delete($id)
    {
        $timetables = DB::table('timetable_record')
        ->where('timetable_id', $id)
        ->delete();
    }

    //Attendance
    public function attendance_record_details($id)
    {
        $data = array();

        $data['attendance_records'] = DB::table('attendance_record')
        ->where('teacher_id', $id)
        ->orderBy('created_at','desc')
        ->paginate(10);

        return view('admin.admin-view-attendance')->with(['attendance_records'=> $data['attendance_records']]);
    }  

    // Subject Enrol
    public function subject_enrol_list(){

        $subject_enrol = DB::table('subject_enrol_record')
        ->orderBy('enrol_id','desc')
        ->get();

        return view('admin.admin-view-subject-enrol-list')->with('subject_enrol',$subject_enrol);
    }

}
