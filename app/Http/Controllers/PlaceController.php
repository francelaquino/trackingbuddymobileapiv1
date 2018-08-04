<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PlaceController extends Controller {

    
    public function updateprofile()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
                DB::table('places')->insert([
                'place'=>Input::get('place'),
                'owner' => Input::get('owner'),
                'latitude' => Input::get('latitude'),
                'longitude' => Input::get('longitude'),
                'latitudeDelta' => Input::get('latitudeDelta'),
                'longitudeDelta' => Input::get('longitudeDelta'),
                'address' => Input::get('address'),
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
