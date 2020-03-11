<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
class SchoolManagementController extends Controller
{
    public function SchoolAdded(){
    	return view('Admin.SchoolMng.AddSchool');
    }

    public function SchoolSave(Request $request){

    	$this->validate($request,[
    		'schoolname'=> 'required|string'
    	]);
        $school= new School();
        $school->schoolname = $request->schoolname;
        $school->status = 1;
        $school->save();

        return back()->with('message','School Added Scuccessfully');

    }

    public function Schoollist(){
    	$schoollist=School::all();
    	return view('Admin.SchoolMng.Schoollist',compact('schoollist'));
    }
    public function unpublishedlist($id){
    	$unpublishlist=School::find($id);
    	$unpublishlist->status=2;
    	$unpublishlist->save();

    	return redirect('school-list')->with('message','Unpublished Scuccessfully');
    }

    public function publishedlist($id){
    	$publishlist=School::find($id);
    	$publishlist->status=1;
    	$publishlist->save();


    	return redirect('school-list')->with('message','published Scuccessfully');

    }

    public function Schooledite($id){
    	$scledit=School::find($id);
        
        return view('Admin.SchoolMng.SchoolEdite',compact('scledit'));

    }
    public function Schoolupdate(Request $request,$id){
        $sclupdat=School::find($id);
        $sclupdat->schoolname=$request->schoolname;
        $sclupdat->save();

        return redirect('school-list')->with('message','update Scuccessfully');
    }
  public function Schooldelete($id){
  	$dlt=School::find($id);
  	$dlt->delete();

  	return redirect('school-list')->with('message','delete Scuccessfully');
  }

}
