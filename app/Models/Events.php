<?php

namespace taboanan\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Events extends Model
{
    
	
  public static function allHome()
  {
    $value=DB::table('events')->where('event_drop_status','=','no')->where('event_status','=',1)->orderBy('event_date','desc')->get();
	return $value;
  
  }	
  
  public static function geteventData()
  {
    $value=DB::table('events')->where('event_drop_status','=','no')->orderBy('event_id','desc')->get();
	return $value;
  
  }
  
  public static function checkVendorReg($user_id,$event_token,$form_type)
  {
    $get=DB::table('events_booking')->where('user_id','=',$user_id)->where('event_token','=',$event_token)->where('form_type','=',$form_type)->where('payment_status','=','completed')->get();
	$value = $get->count();
	return $value;
  
  }
  
  
  public static function checkSponsorReg($user_id,$event_token,$form_type)
  {
    $get=DB::table('events_booking')->where('user_id','=',$user_id)->where('event_token','=',$event_token)->where('form_type','=',$form_type)->where('payment_status','=','completed')->get();
	$value = $get->count();
	return $value;
  
  }
  
  
  public static function saveVendorReg($data)
  {
   
      DB::table('events_booking')->insert($data);
     
 
  }
  
  public static function returnVendor($ord_token,$check_update)
  {
    DB::table('events_booking')
      ->where('purchase_token', $ord_token)
	  ->where('payment_status', 'pending')
      ->update($check_update);
  }
  
  
  
  public static function singlerEvent($slug)
  {

    $value=DB::table('events')->where('event_slug', '=', $slug)->first();
    return $value;
	
  }
  
  
  public static function saveeventData($data)
  {
   
      DB::table('events')->insert($data);
     
 
  }
  
  
  
  public static function totalEvent()
  {
    $get=DB::table('events')->orderBy('event_id','desc')->get();
	$value = $get->count();
	return $value;
  
  }
  
  
  
  
  
  public static function deleteEvents($token,$data){
   
    $image = DB::table('events')->where('event_token', $token)->first();
			$file= $image->upload_image;
			$filename = public_path().'/storage/events/'.$file;
			File::delete($filename); 
			
	DB::table('events')
      		->where('event_token', $token)
      		->update($data);		
    
	
  }	
  
  
  public static function dropEvents($token){
   
    $image = DB::table('events')->where('event_token', $token)->first();
			$file= $image->upload_image;
			$filename = public_path().'/storage/events/'.$file;
			File::delete($filename); 
    
	
  }	
  
  
  public static function singleEvents($token)
  {
  
   $value=DB::table('events')->where('event_token','=',$token)->first();
	return $value;
    
  }
  
  
  public static function upcomingEvents()
  {
   $today = date('Y-m-d h:i a');
   $value=DB::table('events')->where('event_status','=',1)->where('event_start_date_time','>',$today)->orderBy('event_start_date_time','asc')->first();
	return $value;
    
  }
  
  public static function countupcomingEvents()
  {
    $today = date('Y-m-d h:i a');
    $get=DB::table('events')->where('event_status','=',1)->where('event_start_date_time','>',$today)->orderBy('event_start_date_time','asc')->get();
	$value = $get->count();
	return $value;
  }
  
  
  public static function updateEvents($token,$data){
    DB::table('events')
      ->where('event_token', $token)
      ->update($data);
  }
  
  
  
  public static function allEvents()
  {
  
   $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->orderBy('events.event_id','desc')->get();
	return $value;
    
  }
  
  
  public static function singleEvent($slug)
  {
    
	$value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->where('events.event_slug','=',$slug)->first();
	return $value;
  
  }
  
  public static function recentEvent($slug)
  {
  $value=DB::table('events')->where('event_slug','!=',$slug)->take(5)->orderBy('event_id','desc')->get();
	return $value;
    
  }
  
 
   public static function categoryEvents($cat_id)
  {
  
   $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->where('events.event_cat_id','=',$cat_id)->orderBy('events.event_id','desc')->get();
	return $value;
    
  }
  
  
  public static function tagEvents($tag)
  {
  
   $value=DB::table('events')->join('category','category.cat_id','events.event_cat_id')->where('events.event_status','=',1)->where('events.event_tags','LIKE', "%$tag%")->orderBy('events.event_id','desc')->get();
	return $value;
    
  }
  
  public static function viewvendorBooking()
  {
    $value=DB::table('events_booking')->join('events','events.event_token','events_booking.event_token')->join('users','users.id','events_booking.user_id')->where('events_booking.form_type','=','vendor_registration')->orderBy('events_booking.event_reg_id','desc')->get();
	return $value;
  
  }
  
  
  public static function regDetails($reg_id)
  {
   
   $value=DB::table('events_booking')->where('event_reg_id','=',$reg_id)->first();
	return $value;
    
  }
  
  
  public static function regDeleted($reg_id){
    
	DB::table('events_booking')->where('event_reg_id','=',$reg_id)->delete();	
	
	
  }
  
  
  
  
  public static function viewsponsorBooking()
  {
    $value=DB::table('events_booking')->join('events','events.event_token','events_booking.event_token')->join('users','users.id','events_booking.user_id')->where('events_booking.form_type','=','sponsor_registration')->orderBy('events_booking.event_reg_id','desc')->get();
	return $value;
  
  }
  
	
  
}
