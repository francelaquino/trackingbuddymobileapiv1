<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PlaceController extends Controller {

    
    public function saveplace()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {

            $results=DB::select("select  id from places where upper(place)=upper(:place) and owner=:owner",['place'=> Input::get('place'),'owner'=> Input::get('owner')]);
            if(count($results)>0){
                $response["status"]="202";
                $response["isexist"]="true";    
                return $response;
        
            }else{
  
                DB::table('places')->insert([
                'place'=>Input::get('place'),
                'owner' => Input::get('owner'),
                'latitude' => Input::get('latitude'),
                'longitude' => Input::get('longitude'),
                'address' => Input::get('address'),
                'datecreated' => date("Y-m-d H:m:s"),
                'datemodified' => date("Y-m-d H:m:s")]);

             $response["status"]="202";    
        
             return $response;
            }

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]=$e;
            return $response;
         }

    }

    
  public function getplaces($uid)
    {
      $response=array(
            'status'=>'',
            'results'=>'',
      );

      try{
       $results=DB::select("select id, place, latitude, longitude, address from places where owner=:owner order by place ",['owner'=>$uid]);
            if(count($results)>0){
                $response["results"]=$results;
        
            }
            $response["status"]="202";    
            return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
        }
    }


    
    public function deleteplace()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
            $where = array('owner' => Input::get('owneruid'),'id' => Input::get('placeid'));
            DB::table('places')->where($where)->delete();

             $where = array('owner' => Input::get('owneruid'),'placeid' => Input::get('placeid'));
            DB::table('placenotifications')->where($where)->delete();

            $response["status"]="202";    
        
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
         }

    }


  public function getPlaceNotification($owneruid,$placeid,$useruid)
    {
      $response=array(
            'status'=>'',
            'results'=>'',
      );

      try{
       $results=DB::select("select true as arrives,true as leaves from placenotifications where placeid=:placeid and useruid=:useruid and owner=:owner",['placeid'=>$placeid,'useruid'=>$useruid,'owner'=>$owneruid]);
            $response["results"]=$results;
            $response["status"]="202";    
            return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]=$e;
            return $response;
        }
    }
    
    public function updateplace()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
            
          $results=DB::select("select  id from places where upper(place)=upper(:place) and owner=:owner",['place'=> Input::get('place'),'owner'=> Input::get('owner')]);
            if(count($results)>0){

                if($results[0]->id==Input::get('id')){
                     DB::table('places')
                    ->where('id', Input::get('id'))
                    ->where('owner', Input::get('owner'))
                    ->update(['place' => Input::get('place'),
                    'latitude' => Input::get('latitude'),
                    'longitude' => Input::get('longitude'),
                    'address' => Input::get('address'),
                    'datemodified' => date("Y-m-d H:m:s")]);
                    $response["status"]="202";
                     return $response;
                }else{
                    $response["status"]="202";
                    $response["isexist"]="true";
                    return $response;
                }
            }else{
                 DB::table('places')
                    ->where('id', Input::get('id'))
                    ->where('owner', Input::get('owner'))
                    ->update(['place' => Input::get('place'),
                    'latitude' => Input::get('latitude'),
                    'longitude' => Input::get('longitude'),
                    'address' => Input::get('address'),
                    'datemodified' => date("Y-m-d H:m:s")]);
                 $response["status"]="202";
                     return $response;
            }


        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
         }

    }

    
    public function savenotification()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
            $where = array('owner' => Input::get('owner'),'placeid' => Input::get('placeid'),'useruid' => Input::get('useruid'));
            DB::table('placenotifications')->where($where)->delete();

             DB::table('placenotifications')->insert([
                'placeid'=>Input::get('placeid'),
                'owner' => Input::get('owner'),
                'useruid' => Input::get('useruid'),
                'arrives' => Input::get('arrives'),
                'leaves' => Input::get('leaves'),
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
