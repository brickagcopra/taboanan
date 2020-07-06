<?php

namespace taboanan\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class SubCategory extends Model
{
    
	/* category */
	
	protected $table = 'subcategory';
	
  
  
  public function Category(){
      return $this->belongsTo(Category::class);
   }
   
   
  
}
