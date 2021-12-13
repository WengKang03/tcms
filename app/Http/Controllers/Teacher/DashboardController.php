<?php

namespace App\Http\Controllers\Teacher;

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
   public function teacher_edit(Request $request, $id)
   {
       $teachers = DB::table('teacher_record')
       ->where('teacher_id', $id)
       ->first();

       return view('/teacher.teacher-modify-personal-information')->with('teachers',$teachers);
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
       $teachers->teacher_subject = $request->input('subject');
       $teachers->teacher_gender = $request->input('gender');
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

}
