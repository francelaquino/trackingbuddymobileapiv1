<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller {

	
  public function getmember()
    {
      $response=array(
            'status'=>'',
            'results'=>'',
      );
        $results= DB::select("select * from members");
        $response["status"]="202";
        $response["results"]="test";
        
        return $response;
    }
    
    public function register()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
  
            DB::table('members')->insert([
                'uid'=>Input::get('uid'),
                'firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'lastname' => Input::get('lastname'),
                'email' => Input::get('email'),
                'datecreated' => date("Y-m-d H:m:s"),
                'datemodified' => date("Y-m-d H:m:s")]);

             $response["status"]="202";    
        
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
             $response["results"]=$e;
            return $response;
         }

    }



	
}
