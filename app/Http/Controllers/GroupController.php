<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller {

    
    public function addgroup()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
                DB::table('groups')->insert([
                'groupname'=>Input::get('groupname'),
                'owner' => Input::get('owner'),
                'datecreated' => date("Y-m-d H:m:s"),
                'datemodified' => date("Y-m-d H:m:s")]);


             $response["status"]="202";    
        
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
         }

    }


    
	
}
