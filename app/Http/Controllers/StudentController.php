<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\ClassMangement;
use App\StudentType;
class StudentController extends Controller
{
    public function studentregistrationform(){
    	$schools = School::where('status','=',1)->get();
    	$classes = ClassMangement::where('status','=',1)->get();
    	return view('Admin.student.student-registration-form',compact('schools','classes'));
    }

   public function bringStudentType(Request $request){
   	    $Types = StudentType::where('class_id','=',$request->class_iid)->get();
   	     return view('Admin.student.student-type',compact('Types'));
   }
}
