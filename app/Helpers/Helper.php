<?php

namespace taboanan\Helpers;
use Cookie;
use Illuminate\Support\Facades\Crypt;
use taboanan\Models\Languages;

class Helper {
    
    public static function translation($id,$code) 
    {
	
	    if($code == 'en')
		{
		   $tran_value['view'] = Languages::en_Translate($id,$code);
		}
		else
		{
		  $tran_value['view'] = Languages::other_Translate($id,$code);
		}
		return $tran_value['view']->keyword_text;
        
    }
}