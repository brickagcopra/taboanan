<?php

namespace taboanan\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Attribute extends Model
{
    
	protected $table = 'product_attribute';
	
	public function AttributeValue()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id', 'attribute_id');
    }
	
	
	/* attribute value */
	
	public static function getvalueData()
    {

    $value=DB::table('product_attribute_value')->join('users','users.id','product_attribute_value.user_id')->join('product_attribute','product_attribute.attribute_id','product_attribute_value.attribute_id')->where('product_attribute_value.attribute_value_drop_status','=','no')->orderBy('product_attribute_value.attribute_value_id', 'desc')->get(); 
    return $value;
	
    }
	
	
	public static function welvalueData()
    {

    $value=DB::table('product_attribute_value')->join('product_attribute','product_attribute.attribute_id','product_attribute_value.attribute_id')->where('product_attribute_value.attribute_value_drop_status','=','no')->select(DB::raw('product_attribute.*, product_attribute_value.*,product_attribute_value.user_id as user_user_id'))->orderBy('product_attribute_value.attribute_value_id', 'desc')->get(); 
    return $value;
	
    }
	
	
	public static function insertvalueData($data){
   
      DB::table('product_attribute_value')->insert($data);
     
 
    }
	
	public static function deleteValuedata($attribute_value_id,$data){
    
	
	DB::table('product_attribute_value')
      ->where('attribute_value_id', '=', $attribute_value_id)
      ->update($data);
	
  }
  
  
  public static function editValue($attribute_value_id){
    $value = DB::table('product_attribute_value')
      ->where('attribute_value_id', '=', $attribute_value_id)
      ->first();
	return $value;
  }
  
  
  public static function updateValuedata($attribute_value_id, $data){
    DB::table('product_attribute_value')
      ->where('attribute_value_id', '=', $attribute_value_id)
      ->update($data);
  }
	
	
	/* attribute value */
	
	
	
	/* attribute type */

   public static function usergettypeData($user_id)
  {

    $value=DB::table('product_attribute')->join('users','users.id','product_attribute.user_id')->where('user_id','=',$user_id)->where('attribute_drop_status','=','no')->orderBy('attribute_id', 'desc')->get(); 
    return $value;
	
  }

  
  public static function gettypeData()
  {

    $value=DB::table('product_attribute')->join('users','users.id','product_attribute.user_id')->where('attribute_drop_status','=','no')->orderBy('attribute_id', 'desc')->get(); 
    return $value;
	
  }
  
      
  
  public static function inserttypeData($data){
   
      DB::table('product_attribute')->insert($data);
     
 
    }
  
  public static function deleteTypedata($attribute_id,$data){
    
	
	DB::table('product_attribute')
      ->where('attribute_id', '=', $attribute_id)
      ->update($data);
	
  }
  
  
  
  public static function editType($attribute_id){
    $value = DB::table('product_attribute')
      ->where('attribute_id', '=', $attribute_id)
      ->first();
	return $value;
  }
  
  
  public static function updateTypedata($attribute_id, $data){
    DB::table('product_attribute')
      ->where('attribute_id', '=', $attribute_id)
      ->update($data);
  }
  
    
  
  /* attribute type */
  
  
  
	
	
	
	
	
  
  
  
  
}
