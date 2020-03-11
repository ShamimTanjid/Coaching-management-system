<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ClassMangement;
use App\StudentType;
class StudentTypeController extends Controller
{
    public function StudentType(){
    	$studentTypes=$this->getStudentType();

        $batch=DB::table('class_mangements')->get();
        //$batch=ClassMangement::all();
    	return view('Admin.studentType.Student-list',compact('studentTypes','batch'));
    }
    public function StudentTypeAdd(Request $request){
    	 if($request->ajax()){
    	 	$data= new StudentType();
    	 	$data->class_id=$request->class_id;
    	 	$data->student_type=$request->student_type;
    	 	$data->status=1;
    	 	$data->save();
    	 }

    }
    public function StudentTypelist(){
    	$studentTypes= $this->getStudentType();
        $batch=DB::table('class_mangements')->get();
        //$batch=ClassMangement::all();
    	return view('Admin.studentType.student-type-table',compact('studentTypes','batch'));
    }

    public function StudentTypeunpublished(Request $request){
           $data=StudentType::find($request->id);
           $data->status = 2;
           $data->save();


           $studentTypes= $this->getStudentType();
           $batch=DB::table('class_mangements')->get();
        //$batch=ClassMangement::all();
    	return view('Admin.studentType.student-type-table',compact('studentTypes','batch'));
    }
  protected function getStudentType(){
        $studentTypes=DB::table('student_types')
    	->join('class_mangements','student_types.class_id','=','class_mangements.id')
    	->select('student_types.*','class_mangements.classname')
    	->where('student_types.status','!=',3)
        ->get();

        return $studentTypes;

  }

  public function StudentTypepublished(Request $request){
           $data=StudentType::find($request->id);
           $data->status = 1;
           $data->save();


           $studentTypes= $this->getStudentType();
        $batch=DB::table('class_mangements')->get();
        //$batch=ClassMangement::all();
    	return view('Admin.studentType.student-type-table',compact('studentTypes','batch'));
    }
    public function StudentTypeupdate(Request $request){
          $data=StudentType::find($request->type_id);
          $data->student_type=$request->student_type;
          $data->save();


     
         $studentTypes= $this->getStudentType();
        $batch=DB::table('class_mangements')->get();
        //$batch=ClassMangement::all();
    	return view('Admin.studentType.student-type-table',compact('studentTypes','batch'));
    }

    public function StudentTypedelete(Request $request){
    	//return $request->all();
          $data=StudentType::find($request->type_id);
           $data->status = 3;
           $data->save();


           $studentTypes= $this->getStudentType();
        $batch=DB::table('class_mangements')->get();
        //$batch=ClassMangement::all();
    	return view('Admin.studentType.student-type-table',compact('studentTypes','batch'));
    }

    public function classwiseStudentTypeadd(Request $request){
    	$types = StudentType::where(['class_id'=>$request->class_id])->where('student_types.status','!=',3)->get();
    	return view('Admin.Batch.class-wise-student-type',compact('types'));

    }

}
