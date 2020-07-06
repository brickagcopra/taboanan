<?php

namespace taboanan\Http\Controllers\Admin;

use Illuminate\Http\Request;
use taboanan\Http\Controllers\Controller;
use Session;
use taboanan\Models\Slideshow;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class SlideshowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	
	
	public function slideshow()
    {
      	$slideData['slide'] = Slideshow::getslideData();
		return view('admin.slideshow',[ 'slideData' => $slideData]);
    }
    
	
	public function add_slideshow()
	{
	   
	   return view('admin.add-slideshow');
	}
	
	
	public function page_slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    }
	
	
	
	public function save_slideshow(Request $request)
	{
 
         if(!empty($request->input('slide_order')))
		 {
         $slide_order = $request->input('slide_order');
		 }
		 else
		 {
		 $slide_order = 0;
		 }
		 $slide_status = $request->input('slide_status');
		 $image_size = $request->input('image_size');
		 $slide_title = $request->input('slide_title');
		 $slide_desc = $request->input('slide_desc');
		 $slide_btn_text = $request->input('slide_btn_text');
		 $slide_btn_link = $request->input('slide_btn_link');
		 $slide_text_position = $request->input('slide_text_position');
		 
         
		 $request->validate([
		                    'slide_image' => 'required|mimes:jpeg,jpg,png|max:'.$image_size,
							'slide_status' => 'required',
							
							
         ]);
		 $rules = array(
				
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make(Input::all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		
		   if ($request->hasFile('slide_image')) 
		   {
		   
			$image = $request->file('slide_image');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/slideshow');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$slide_image = $img_name;
		  }
		  else
		  {
		     $slide_image = "";
		  }
		 
		$data = array('slide_image' => $slide_image, 'slide_order' => $slide_order, 'slide_status' => $slide_status, 'slide_title' => $slide_title, 'slide_desc' => $slide_desc, 'slide_btn_text' => $slide_btn_text	, 'slide_btn_link' => $slide_btn_link, 'slide_text_position' => $slide_text_position);
        Slideshow::insertslideData($data);
        return redirect()->back()->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  
  
  public function delete_slideshow($slide_id){

      
	  
      Slideshow::deleteSlidedata($slide_id);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  
  public function edit_slideshow($slide_id)
	{
	   
	   $edit['slide'] = Slideshow::editslideData($slide_id);
	   return view('admin.edit-slideshow', [ 'edit' => $edit, 'slide_id' => $slide_id]);
	}
	
	
	
	public function update_slideshow(Request $request)
	{
	
	   if(!empty($request->input('slide_order')))
		 {
         $slide_order = $request->input('slide_order');
		 }
		 else
		 {
		 $slide_order = 0;
		 }
		 $slide_status = $request->input('slide_status');
		 $image_size = $request->input('image_size');
		 $slide_id = $request->input('slide_id');
		 $slide_title = $request->input('slide_title');
		 $slide_desc = $request->input('slide_desc');
		 $slide_btn_text = $request->input('slide_btn_text');
		 $slide_btn_link = $request->input('slide_btn_link');
		 $slide_text_position = $request->input('slide_text_position');
		 		 
         
		 $request->validate([
		                    'slide_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							'slide_status' => 'required',
							
							
         ]);
		 $rules = array(
				
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make(Input::all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		
		   if ($request->hasFile('slide_image')) 
		   {
		    Slideshow::dropSlide($slide_id);
			$image = $request->file('slide_image');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/slideshow');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$slide_image = $img_name;
		  }
		  else
		  {
		     $slide_image = $request->input('save_slide_image');
		  }
		 
		$data = array('slide_image' => $slide_image, 'slide_order' => $slide_order, 'slide_status' => $slide_status, 'slide_title' => $slide_title, 'slide_desc' => $slide_desc, 'slide_btn_text' => $slide_btn_text	, 'slide_btn_link' => $slide_btn_link, 'slide_text_position' => $slide_text_position);
        Slideshow::updateslideData($slide_id,$data);
        return redirect()->back()->with('success', 'Update successfully.');
            
 
       } 
      
     
       
	
	
	}
	
  
	
	
	
}
