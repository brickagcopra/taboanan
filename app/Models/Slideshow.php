<?php

namespace taboanan\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Slideshow extends Model
{
    
	/* slideshow */
	
  
  public static function getslideData()
  {

    $value=DB::table('slideshow')->orderBy('slide_id', 'desc')->get(); 
    return $value;
	
  }
  
  public static function insertslideData($data){
   
      DB::table('slideshow')->insert($data);
     
 
    }
	
   public static function deleteSlidedata($slide_id){
   
    $image = DB::table('slideshow')->where('slide_id', $slide_id)->first();
			$file= $image->slide_image;
			$filename = public_path().'/storage/slideshow/'.$file;
			File::delete($filename); 
    
	DB::table('slideshow')->where('slide_id', '=', $slide_id)->delete();	
	
	
  }	
  
  
  public static function editslideData($slide_id){
    $value = DB::table('slideshow')
      ->where('slide_id', $slide_id)
      ->first();
	return $value;
  }
	
	
	
  public static function updateslideData($slide_id,$data){
    DB::table('slideshow')
      ->where('slide_id', $slide_id)
      ->update($data);
  }
  	
  
  public static function dropSlide($slide_id)
	  {
		 $image = DB::table('slideshow')->where('slide_id', $slide_id)->first();
			$file= $image->slide_image;
			$filename = public_path().'/storage/slideshow/'.$file;
			File::delete($filename);
	  }
  
  public static function viewSlideshow()
  {
    $value=DB::table('slideshow')->where('slide_status','=','1')->orderBy('slide_order', 'asc')->get(); 
    return $value;
     
  }
  /* slideshow */
  
  
  
	
	
	
	
	
  
  
  
  
}
