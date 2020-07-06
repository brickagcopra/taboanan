<?php

namespace taboanan\Http\Controllers\Admin;

use Illuminate\Http\Request;
use taboanan\Http\Controllers\Controller;
use Session;
use taboanan\Models\Events;
use taboanan\Models\Category;
use taboanan\Models\Settings;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use URL;
use Mail;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	public function events()
    {
        
		$event['view'] = Events::geteventData();
		return view('admin.events',[ 'event' => $event]);
    }
	
	
	
	public static function events_bookings_delete($booking_id,$status)
    {
    
	if($status == 0)
    {
	    Events::dropBooking($booking_id);
		return redirect()->back()->with('success', 'Deleted successfully.');		
	}
	else
	{
	
	  $get['book'] = Events::singleBooking($booking_id);
	  $event_token = $get['book']->event_token;
	  $seats = $get['book']->booking_seats;
	  $event['view'] = Events::singleEvents($event_token);
	  $update_seat = $event['view']->event_booked_seat - $seats;
	  $data = array('event_booked_seat' => $update_seat);
	  Events::updateEvents($event_token,$data);
	  Events::dropBooking($booking_id);
	   return redirect()->back()->with('success', 'Deleted successfully.');  
	}
  
  
  }
  
  
  public static function events_bookings_approval($status,$booking_id,$event_token)
  {
    
	if($status == 'approval')
	{
	  $get['book'] = Events::singleBooking($booking_id);
	  $event_token = $get['book']->event_token;
	  $seats = $get['book']->booking_seats;
	  $event['view'] = Events::singleEvents($event_token);
	  $update_seat = $event['view']->event_booked_seat + $seats;
	  $data = array('event_booked_seat' => $update_seat);
	  Events::updateEvents($event_token,$data);
	  $book_data = array('booking_approval' => 'Approved', 'booking_status' => 1);
	  Events::updateEventbooking($booking_id,$book_data);
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $to_name = $get['book']->booking_name;
	  $to_email = $get['book']->booking_email;
	  $from_name = $setting['setting']->sender_name;
      $from_email = $setting['setting']->sender_email;
	  $event_url = URL::to('/event').'/'.$event['view']->event_slug;
	  $booking_seats = $seats;
		
		$record = array('event_url' => $event_url, 'from_name' => $from_name, 'from_email' => $from_email, 'booking_seats' => $booking_seats);
		Mail::send('admin.event_booking_approval_mail', $record, function($message) use ($from_name, $from_email, $to_name, $to_email, $event_url) {
			$message->to($to_email, $to_name)
					->subject('Event Booking');
			$message->from($from_email,$from_name);
		});	
	  
	  return redirect()->back()->with('success', 'Event booking has been approved');
	   
	}
	else
	{
	  $book_data = array('booking_approval' => 'Rejected', 'booking_status' => 0);
	  Events::updateEventbooking($booking_id,$book_data);
	  $get['book'] = Events::singleBooking($booking_id);
	  $seats = $get['book']->booking_seats;
	  $event_token = $get['book']->event_token;
	  $event['view'] = Events::singleEvents($event_token);
	  $sid = 1;
	  $setting['setting'] = Settings::editGeneral($sid);
	  $to_name = $get['book']->booking_name;
	  $to_email = $get['book']->booking_email;
	  $from_name = $setting['setting']->sender_name;
      $from_email = $setting['setting']->sender_email;
	  $event_url = URL::to('/event').'/'.$event['view']->event_slug;
	  $booking_seats = $seats;
		
		$record = array('event_url' => $event_url, 'from_name' => $from_name, 'from_email' => $from_email, 'booking_seats' => $booking_seats);
		Mail::send('admin.event_booking_reject_mail', $record, function($message) use ($from_name, $from_email, $to_name, $to_email, $event_url) {
			$message->to($to_email, $to_name)
					->subject('Event Booking');
			$message->from($from_email,$from_name);
		});	
	  return redirect()->back()->with('error', 'Event booking has been rejected');
	}
	
	
  }
	
	
	public function sponsor_registration()
    {
        
		$event['view'] = Events::viewsponsorBooking();
		return view('admin.sponsor-registration',[ 'event' => $event]);
    }
	
	public function sponsor_registration_details($reg_id)
	{
	   $event = Events::regDetails($reg_id);
	   return view('admin.sponsor-registration-details',[ 'event' => $event]);
	}
	
	
	public function vendor_registration()
    {
        
		$event['view'] = Events::viewvendorBooking();
		return view('admin.vendor-registration',[ 'event' => $event]);
    }
	
	public function vendor_registration_details($reg_id)
	{
	   $event = Events::regDetails($reg_id);
	   return view('admin.vendor-registration-details',[ 'event' => $event]);
	}
	
	
	public function vendor_registration_delete($reg_id)
	{
	  Events::regDeleted($reg_id); 
	  return redirect()->back()->with('success', 'Deleted Successfully');
	}
	
	
	public function add_event()
	{
	 
	 
	  return view('admin.add-event');
	
	}
	
	
	public function edit_event($token)
	{
	  $category['view'] = Category::quickbookData();
	  $edit['view'] = Events::singleEvents($token);
	  return view('admin.edit-event',[ 'category' => $category, 'edit' => $edit]);
	}
	
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	public function event_slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    }
	
	
	public function edit_events(Request $request)
	{
	
	   $event_name = $request->input('event_name');
	   $event_slug = $this->event_slug($event_name);
	   $image_size = $request->input('image_size');	
	   $event_theme = $request->input('event_theme');
	   $event_description = $request->input('event_description');
	   $event_requirement = $request->input('event_requirement');
	   $event_date = $request->input('event_date');
	   $event_location = $request->input('event_location');
	   $type_of_registration = $request->input('type_of_registration');
	   $registration_amount = $request->input('registration_amount');
	   $sponsorship = $request->input('sponsorship');
	   $package_amount_1 = $request->input('package_amount_1');
	   $package_inclusion_1 = $request->input('package_inclusion_1');
	   $package_amount_2 = $request->input('package_amount_2');
	   $package_inclusion_2 = $request->input('package_inclusion_2');
	   $package_amount_3 = $request->input('package_amount_3');
	   $package_inclusion_3 = $request->input('package_inclusion_3');	
	   $event_token = $request->input('event_token');	
	   $event_status = $request->input('event_status');
	   $save_upload_image = $request->input('save_upload_image');
	   $event_approve_status = "Thanks for your submission. Your details updated successfully.";
	   	   
	   
	   $request->validate([
							'event_name' => 'required',
							'upload_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				
				'event_name' => ['required', Rule::unique('events') ->ignore($event_token, 'event_token') -> where(function($sql){ $sql->where('event_drop_status','=','no');})],
				
				
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
	        
		  
			   if ($request->hasFile('upload_image')) 
				  {
				    Events::dropEvents($event_token);
					$image = $request->file('upload_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/events');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$upload_image = $img_name;
				  }
				  else
				  {
					 $upload_image = $save_upload_image;
				  }
			   
			   $data = array('event_name' => $event_name, 'event_slug' => $event_slug, 'event_theme' => $event_theme, 'event_description' => $event_description, 'event_requirement' => $event_requirement, 'event_date' => $event_date, 'event_location' => $event_location, 'type_of_registration' => $type_of_registration, 'registration_amount' => $registration_amount, 'sponsorship' => $sponsorship, 'package_amount_1' => $package_amount_1, 'package_amount_2' => $package_amount_2, 'package_amount_3' => $package_amount_3, 'package_inclusion_1' => $package_inclusion_1, 'package_inclusion_2' => $package_inclusion_2, 'package_inclusion_3' => $package_inclusion_3, 'upload_image' => $upload_image, 'event_status' => $event_status);
			   
			   Events::updateEvents($event_token,$data);
			   
			   return redirect()->back()->with('success', $event_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	
	
	
	public function update_events(Request $request)
	{
	
	   $event_name = $request->input('event_name');
	   $event_slug = $this->event_slug($event_name);
	   $image_size = $request->input('image_size');	
	   $event_token = $this->generateRandomString();
	   $event_status = $request->input('event_status');
	   $event_theme = $request->input('event_theme');
	   $event_description = $request->input('event_description');
	   $event_requirement = $request->input('event_requirement');
	   $event_date = $request->input('event_date');
	   $event_location = $request->input('event_location');
	   $type_of_registration = $request->input('type_of_registration');
	   $registration_amount = $request->input('registration_amount');
	   $sponsorship = $request->input('sponsorship');
	   $package_amount_1 = $request->input('package_amount_1');
	   $package_inclusion_1 = $request->input('package_inclusion_1');
	   $package_amount_2 = $request->input('package_amount_2');
	   $package_inclusion_2 = $request->input('package_inclusion_2');
	   $package_amount_3 = $request->input('package_amount_3');
	   $package_inclusion_3 = $request->input('package_inclusion_3');
	   $event_status = $request->input('event_status');
	   
	   
	   $event_approve_status = "Thanks for your submission. Your details updated successfully.";
	   $event_update_date = date('Y-m-d H:i:s');	   
	   
	   $request->validate([
							'event_name' => 'required',
							'upload_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
				
				'event_name' => ['required',  Rule::unique('events') -> where(function($sql){ $sql->where('event_drop_status','=','no');})],
				
				
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
	        
		  
			   if ($request->hasFile('upload_image')) 
				  {
					$image = $request->file('upload_image');
					$img_name = time() . '.'.$image->getClientOriginalExtension();
					$destinationPath = public_path('/storage/events');
					$imagePath = $destinationPath. "/".  $img_name;
					$image->move($destinationPath, $img_name);
					$upload_image = $img_name;
				  }
				  else
				  {
					 $upload_image = "";
				  }
			   
			   $data = array('event_token' => $event_token, 'event_name' => $event_name, 'event_slug' => $event_slug, 'event_theme' => $event_theme, 'event_description' => $event_description, 'event_requirement' => $event_requirement, 'event_date' => $event_date, 'event_location' => $event_location, 'type_of_registration' => $type_of_registration, 'registration_amount' => $registration_amount, 'sponsorship' => $sponsorship, 'package_amount_1' => $package_amount_1, 'package_amount_2' => $package_amount_2, 'package_amount_3' => $package_amount_3, 'package_inclusion_1' => $package_inclusion_1, 'package_inclusion_2' => $package_inclusion_2, 'package_inclusion_3' => $package_inclusion_3, 'upload_image' => $upload_image, 'event_status' => $event_status);
			   
			   Events::saveeventData($data);
			   
			   return redirect()->back()->with('success', $event_approve_status);
			
			   
			   
		}
		
				
	
	
	}
	
	
	public function events_delete($token)
	{
	   
	   $data = array('event_drop_status'=>'yes', 'event_status' => 0);
	  
      Events::deleteEvents($token,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');
	
	}
	
  
	
	
	
}
