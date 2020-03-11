<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassMangement;
use App\BatchManagement;
class BatchManagementController extends Controller
{
    public function BatchAdded(){
    	$batch=ClassMangement::all();
    	return view('Admin.Batch.AddBatch',compact('batch'));
    }

    public function BatchSaved(Request $request){
    
    	$this->validate($request,[
    		'class_id'=>'required',
        'student_type_id'=>'required',
    		'batchname'=> 'required|string',
    		'studentcapacity'=> 'required'
    	]);

    	$Baatch=new BatchManagement();
    	$Baatch->class_id = $request->class_id;
      $Baatch->student_type_id = $request->student_type_id;
    	$Baatch->batchname = $request->batchname;
    	$Baatch->studentcapacity = $request->studentcapacity;
    	$Baatch->status = 1;
    	$Baatch->save();

    	return back()->with('message','Baatch added successfully');
    }
    public function BatchLList(){

         $batch=ClassMangement::all();  	

    	//$batchllis=BatchManagement::all();
    	return view('Admin.Batch.BatchList',compact('batch'));
    }
   public function batchlistbyajax(Request $request){

        $batchess= BatchManagement::where([
        	'class_id'=>$request->class_id,
          'student_type_id'=>$request->type_id,
        ])->where('status','!=',3)->get();
        if (count($batchess)>0) {
        	return view('Admin.Batch.BatchListbyajax',compact('batchess'));
        }else{
        	return view('Admin.Batch.BatchEmptyerr',compact('batchess'));
        }
        
   }

   public function Batchunpublished(Request $request){
   	 $batchh=BatchManagement::find($request->batch_id);
       $batchh->status=2;
       $batchh->save();


       $batchess= BatchManagement::where([
        	'class_id'=>$request->class_id
        ])->get();
        return view('Admin.Batch.BatchListbyajax',compact('batchess'))->with('message','Batch unpublished');
   }
   public function Batchpublished(Request $request){
   	 $batchh=BatchManagement::find($request->batch_id);
       $batchh->status=1;
       $batchh->save();


       $batchess= BatchManagement::where([
        	'class_id'=>$request->class_id
        ])->get();
        return view('Admin.Batch.BatchListbyajax',compact('batchess'))->with('message','Batch published');
   }

   public function BatchDeelete(Request $request){
   	 $batchh=BatchManagement::find($request->batch_id);
       $batchh->delete();

      
       $batchess= BatchManagement::where([
        	'class_id'=>$request->class_id
        ])->get();

       if(count($batchess)>0){
       	return view('Admin.Batch.BatchListbyajax',compact('batchess'));
       }else{
       	return view('Admin.Batch.BatchEmptyerr',compact('batchess'));
       }
        
   }

   public function BatchEidite($id){
         $batchh=BatchManagement::find($id);
        $clsbatch=ClassMangement::all();
         return view('Admin.Batch.BatchListEdite',[
         	'batchh'=>$batchh,
         	'clsbatch'=>$clsbatch
         ]);
   }
  public function BatchUpdate(Request $request,$id){
     $this->validate($request,[
    		'class_id'=>'required',
    		'batchname'=> 'required|string',
    		'studentcapacity'=> 'required'
    	]);
       $Baatch=BatchManagement::find($id);
        $Baatch->class_id = $request->class_id;
    	$Baatch->batchname = $request->batchname;
    	$Baatch->studentcapacity = $request->studentcapacity;  	
    	$Baatch->save();
 return redirect('Batch-list')->with('message','Batch Info Update Successfully');
}

}
