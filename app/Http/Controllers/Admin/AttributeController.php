<?php

namespace taboanan\Http\Controllers\Admin;

use Illuminate\Http\Request;
use taboanan\Http\Controllers\Controller;
use Session;
use taboanan\Models\Attribute;
use taboanan\Models\Settings;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
	
	
	
	/* attribute value */
	
	public function attribute_value()
    {
        
		
		$valueData['view'] = Attribute::getvalueData();
		return view('admin.attribute-value',[ 'valueData' => $valueData]);
    }
	
	
	public function add_attribute_value()
	{
	   $typeData['view'] = Attribute::gettypeData();
	   return view('admin.add-attribute-value',[ 'typeData' => $typeData]);
	}
	
	
	public function save_attribute_value(Request $request)
	{
 
    
         $attribute_type = $request->input('attribute_type');
		 $user_id = $request->input('user_id');
		 $attribute_value = $request->input('attribute_value');
         $attribute_value_slug = $this->attribute_slug($attribute_value);
		 $attribute_status = $request->input('attribute_status');
		 	
		 
		
		 
		 
         
		 $request->validate([
							'attribute_type' => 'required',
							'attribute_value' => 'required',
							'attribute_status' => 'required',
							
         ]);
		 $rules = array(
				'attribute_value' => ['required',  Rule::unique('product_attribute_value') -> where(function($sql){ $sql->where('attribute_value_drop_status','=','no');})],
				
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
		
		
		 
		$data = array('attribute_id' => $attribute_type, 'user_id' => $user_id, 'attribute_value' => $attribute_value, 'attribute_value_slug' => $attribute_value_slug, 'attribute_value_status' => $attribute_status);
        Attribute::insertvalueData($data);
        return redirect('/admin/attribute-value')->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  
    public function delete_attribute_value($attribute_value_id){

      $data = array('attribute_value_drop_status' => 'yes');
	  
      Attribute::deleteValuedata($attribute_value_id,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  
  public function edit_attribute_value($attribute_value_id)
	{
	   $typeData['view'] = Attribute::gettypeData();
	   $edit['value'] = Attribute::editValue($attribute_value_id);
	   return view('admin.edit-attribute-value', [ 'edit' => $edit, 'attribute_value_id' => $attribute_value_id, 'typeData' => $typeData]);
	}
	
	
	
	public function update_attribute_value(Request $request)
	{
	
	     $attribute_type = $request->input('attribute_type');
		 $attribute_value_id = $request->input('attribute_value_id');
		 $attribute_value = $request->input('attribute_value');
         $attribute_value_slug = $this->attribute_slug($attribute_value);
		 $attribute_status = $request->input('attribute_status');
		 
         
		 $request->validate([
							'attribute_type' => 'required',
							'attribute_value' => 'required',
							'attribute_status' => 'required',
							
         ]);
		 $rules = array(
				'attribute_value' => ['required',  Rule::unique('product_attribute_value') ->ignore($attribute_value_id, 'attribute_value_id') -> where(function($sql){ $sql->where('attribute_value_drop_status','=','no');})],
				
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
		
		
		$data = array('attribute_id' => $attribute_type, 'attribute_value' => $attribute_value, 'attribute_value_slug' => $attribute_value_slug, 'attribute_value_status' => $attribute_status);
        Attribute::updateValuedata($attribute_value_id, $data);
        return redirect('/admin/attribute-value')->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
	
	/* attribute value */
	
	
	
	/* attribute type */
	
	
	public function attribute_type()
    {
        
		
		$typeData['view'] = Attribute::gettypeData();
		return view('admin.attribute-type',[ 'typeData' => $typeData]);
    }
	
	
    
	
	public function add_attribute_type()
	{
	   
	   return view('admin.add-attribute-type');
	}
	
	
	public function attribute_slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    }
	
	
	
	public function save_attribute_type(Request $request)
	{
 
    
         $attribute_name = $request->input('attribute_name');
		 $user_id = $request->input('user_id');
		 
         $attribute_slug = $this->attribute_slug($attribute_name);
		 $attribute_status = $request->input('attribute_status');
		 $attribute_search = $request->input('attribute_search');
		
		 if($request->input('attribute_order'))
		 {
		    $attribute_order = $request->input('attribute_order');
		 }
		 else
		 {
		   $attribute_order = 0;
		 }
		
		 
		 
         
		 $request->validate([
							'attribute_name' => 'required',
							'attribute_search' => 'required',
							'attribute_status' => 'required',
							
         ]);
		 $rules = array(
				'attribute_name' => ['required',  Rule::unique('product_attribute') -> where(function($sql){ $sql->where('attribute_drop_status','=','no');})],
				
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
		
		
		 
		$data = array('attribute_name' => $attribute_name, 'user_id' => $user_id, 'attribute_slug' => $attribute_slug,  'attribute_search' => $attribute_search, 'attribute_status' => $attribute_status, 'attribute_order' => $attribute_order);
        Attribute::inserttypeData($data);
        return redirect('/admin/attribute-type')->with('success', 'Insert successfully.');
            
 
       } 
     
    
  }
  
  
  
  public function delete_attribute($attribute_id){

      $data = array('attribute_drop_status' => 'yes');
	  
      Attribute::deleteTypedata($attribute_id,$data);
	  
	  return redirect()->back()->with('success', 'Delete successfully.');

    
  }
  
  
  public function edit_attribute_type($attribute_id)
	{
	   
	   $edit['type'] = Attribute::editType($attribute_id);
	   return view('admin.edit-attribute-type', [ 'edit' => $edit, 'attribute_id' => $attribute_id]);
	}
	
	
		
	
	
	public function update_attribute_type(Request $request)
	{
	
	     $attribute_name = $request->input('attribute_name');
		 $attribute_id = $request->input('attribute_id');
		 
         $attribute_slug = $this->attribute_slug($attribute_name);
		 $attribute_status = $request->input('attribute_status');
		 $attribute_search = $request->input('attribute_search');
		
		 if($request->input('attribute_order'))
		 {
		    $attribute_order = $request->input('attribute_order');
		 }
		 else
		 {
		   $attribute_order = 0;
		 }
		 
         
		 $request->validate([
							'attribute_name' => 'required',
							'attribute_search' => 'required',
							'attribute_status' => 'required',
							
         ]);
		 $rules = array(
				'attribute_name' => ['required',  Rule::unique('product_attribute') ->ignore($attribute_id, 'attribute_id') -> where(function($sql){ $sql->where('attribute_drop_status','=','no');})],
				
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
		
		
		$data = array('attribute_name' => $attribute_name, 'attribute_slug' => $attribute_slug,  'attribute_search' => $attribute_search, 'attribute_status' => $attribute_status, 'attribute_order' => $attribute_order);
        Attribute::updateTypedata($attribute_id, $data);
        return redirect('/admin/attribute-type')->with('success', 'Update successfully.');
            
 
       } 
     
       
	
	
	}
	
  
	
	
	
}
