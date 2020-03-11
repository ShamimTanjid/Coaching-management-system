<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Image;
class SlideController extends Controller
{
    public function AddSlide(){
    	return view('Admin.includes.slide-add');
    }

    public function UploadeSlide(Request $request){

              $validatedData = $request->validate([
                       'slide_image' => 'required',
                        'slide_title' => 'required',
                        'slide_description' => 'required',
                        'status' => 'required',                    
                  ]);

              $data = new Slide();
              $data->slide_image =$this->CreateSlider($request);
              $data->slide_title =$request->slide_title;             
              $data->slide_description =$request->slide_description;
              $data->status =$request->status;
              $data->save();
              return back()->with('message','Neq Slide Added Successfully');

   }

   protected function CreateSlider($request){
                $file = $request->file('slide_image');
                $imageName=  $file->getClientOriginalName();
                $directory = 'Admin/assets/slider/';
                $imgUrl = $directory.$imageName;
               // $file->move($directory,$imgUrl);

               Image::make($file)->resize(1400, 570)->save($imgUrl);
               return $imgUrl;
   }
   public function manageslide(){
       $mngdslide=Slide::all();
       return view('Admin.includes.manage-slide',compact('mngdslide'));
   }

   public function slideunpublished($id){
          $slide = Slide::find($id);
          $slide->status = 2;
          $slide->save();
          return redirect('/manage-slide')->with('error_message','Slide unpublish successfully');
    }
  public function slidepublished($id){
  	$slidepublsd = Slide::find($id);
  	$slidepublsd->status = 1;
  	$slidepublsd->save();

  	return redirect('/manage-slide')->with('message','Slide publish successfully');
  }

  public function PhotoGallery(){
  	$phtogallery=Slide::all();

  	return view('Admin.includes.photo-gallery',compact('phtogallery'));
  }

  public function SlideEdite($id){
  	$editslide=Slide::find($id);
  	return view('Admin.includes.slide-edite',compact('editslide'));
  }
  public function Slideupdate(Request $request,$id){

        $slideupdt=Slide::find($id);
        $slideupdt->slide_title=$request->slide_title;
        $slideupdt->slide_description=$request->slide_description;
        $slideupdt->status=$request->status;


        if($request->file('slide_image')){
              unlink($slideupdt->slide_image);

              $slideupdt->slide_image =$this->CreateSlider($request);
        }
        $slideupdt->save();
        return redirect('/manage-slide')->with('message','slide update successfully Done');
  }

  public function SlideDelete($id){
  	$dlt=Slide::find($id);
  	unlink($dlt->slide_image);
  	$dlt->delete();
  	return redirect('/manage-slide')->with('message','Delete  successfully Done');

  }
}
