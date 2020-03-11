<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassMangement;

class ClassManagementController extends Controller
{
    //
    public function ClassesAdded(){
    	return view('Admin.Classmngmnt.Classadded');
    }

    public function ClassesInsert(Request $request){
    	$this->validate($request,[
    		'classname'=>'required|string'
    	]);

    	$classmodel= new ClassMangement;
        $classmodel->classname=$request->classname;
        $classmodel->status=1;
        $classmodel->save();

        return back()->with('message','Class Added Successfully');
    }

    public function AllClassesList(){
    	$allclass=ClassMangement::all();
    	return view('Admin.Classmngmnt.AllClassList')->with('Allclss',$allclass);
    }

    public function Classunpublished($id){
    	$classpublishess=ClassMangement::find($id);
         
         $classpublishess->status=2;
         $classpublishess->save();
         return redirect('Class-list')->with('message','Unpublished successfully');
    }

    public function Classpublished($id){
    	$classpublished=ClassMangement::find($id);
         
         $classpublished->status=1;
         $classpublished->save();
         return redirect('Class-list')->with('message','published successfully');
    }

    public function ClassEdite($id){
    	$clssedit=ClassMangement::find($id);
    	 return view('Admin.Classmngmnt.ClassUpagePage',compact('clssedit'));
    }

    public function ClassUpdate(Request $request,$id){
        $clssupdat=ClassMangement::find($id);
        $clssupdat->classname=$request->classname;
        $clssupdat->save();

        return redirect('Class-list')->with('message','update Scuccessfully');
    }
    public function ClassDelete($id){
  	$dlt=ClassMangement::find($id);
  	$dlt->delete();

  	return redirect('Class-list')->with('message','delete Scuccessfully');
  }
}
