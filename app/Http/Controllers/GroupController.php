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
            'isexist'=>'false'
            );
        try
        {
            $results=DB::select("select  id from groups where upper(groupname)=upper(:groupname) and owner=:owner",['groupname'=> Input::get('groupname'),'owner'=> Input::get('owner')]);
            if(count($results)>0){
                $response["status"]="202";
                $response["isexist"]="true";    
                return $response;
        
            }else{
                $avatar="";
                $emptyPhoto=false;
                if(Input::get('avatar')==""){
                    $avatar="https://firebasestorage.googleapis.com/v0/b/trackingbuddy-5598a.appspot.com/o/group_photos%2Fgroup_empty.png?alt=media&token=2f84667f-b828-4303-b18d-8310279ac5a6";
                    $emptyPhoto=true;
                }else{
                    $avatar=Input::get('avatar');
                }

                    DB::table('groups')->insert([
                    'groupname'=>Input::get('groupname'),
                    'owner' => Input::get('owner'),
                    'avatarfilename' => Input::get('avatarfilename'),
                    'avatar' => $avatar,
                    'emptyphoto' => $emptyPhoto,
                    'datecreated' => date("Y-m-d H:m:s"),
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


    
    
    public function deletegroup()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
            $where = array('owner' => Input::get('owneruid'),'id' => Input::get('id'));
            DB::table('groups')->where($where)->delete();

            //Later Delete member 
            $response["status"]="202";    
        
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
         }

    }

  public function getgroups($uid)
    {
      $response=array(
            'status'=>'',
            'results'=>'',
      );

      try{
       $results=DB::select("select id, groupname, avatar,emptyphoto from groups where owner=:owner order by groupname",['owner'=>$uid]);
            $response["results"]=$results;
            $response["status"]="202";    
            return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
        }
    }

    
    
    public function updategroup()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
            $avatar="";
            $emptyPhoto=false;
            if(Input::get('avatar')==""){
                $avatar="https://firebasestorage.googleapis.com/v0/b/trackingbuddy-5598a.appspot.com/o/group_photos%2Fgroup_empty.png?alt=media&token=2f84667f-b828-4303-b18d-8310279ac5a6";
                $emptyPhoto=true;
            }else{
                $avatar=Input::get('avatar');
            }
  
  
            DB::table('groups')
                ->where('id', Input::get('id'))
                ->where('owner', Input::get('owner'))
                ->update(['groupname' => Input::get('groupname'),
                'avatar' => $avatar,
                'emptyphoto' => $emptyPhoto,
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
