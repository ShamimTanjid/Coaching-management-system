<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderFooter;
use DB;
class HomePageController extends Controller
{
    public function AddHeaderFooter(){
         $headerfooter=DB::table('header_footers')->first();
        if (isset($headerfooter)){
        	return view('Admin.includes.manage-header-footer',[
    		'headerfooter'=>$headerfooter,
    	]);
        }else{
        	return view('Admin.includes.header-footer');
        }
    		
    }
    public function headerfootersave(Request $request){

    	             $validatedData = $request->validate([
                       'ownername' => 'required',
                        'ownerdepartment' => 'required',
                        'mobile' => 'required',
                        'address' => 'required',
                        'copyright' => 'required',

                  ]);
       	       	
       	       	    	$data = new HeaderFooter();
       	       	    	$data->ownername = $request->ownername;
       	       	    	$data->ownerdepartment = $request->ownerdepartment;
       	       	    	$data->mobile = $request->mobile;
       	       	    	$data->address = $request->address;
       	       	    	$data->copyright = $request->copyright;
       	       	    	$data->status = $request->status;
       	       	    	$data->save();
       	       	
       	       	    	return redirect('/home')->with('message','Header and footer update successfully');	
    
    }


    public function manageheaderfooter($id){

    	$headerfooter= HeaderFooter::find($id);
    	return view('Admin.includes.manage-header-footer',compact('headerfooter'));




    }

  public function updateheaderfooter(Request $request,$id){
                 

                   $this->headerfooterValidation($request);

                        $update= HeaderFooter::find($id);
                        $update->ownername = $request->ownername;
       	       	    	$update->ownerdepartment = $request->ownerdepartment;
       	       	    	$update->mobile = $request->mobile;
       	       	    	$update->address = $request->address;
       	       	    	$update->copyright = $request->copyright;
       	       	    	
       	       	    	$update->save();
       	       	
       	       	    	return redirect('/home')->with('message','Header and footer Added successfully');	
    
  }


  protected function headerfooterValidation($request){
  	                   $this->validate($request,[
  	                   	'ownername' => 'required',
                        'ownerdepartment' => 'required',
                        'mobile' => 'required',
                        'address' => 'required',
                        'copyright' => 'required',
  	                   ]);
  }

}