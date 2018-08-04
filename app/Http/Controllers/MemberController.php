<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller {


    public function test()
    {
        $results=DB::select("select  Date_Format(invitationcodeexpiration, '%e-%b-%Y') as invitationcodeexpiration, uid from members where invitationcode=2");
        if(date('Y-m-d',strtotime($results[0]->invitationcodeexpiration))< date("Y-m-d")){
            return "true";
        }else{
            return "false";
        }

        return "";
    }
	
  public function getmemberinfo($uid)
    {
      $response=array(
            'status'=>'',
            'results'=>'',
      );

      try{
       $results=DB::select("select id, uid, firstname, middlename, lastname, email, mobileno,avatar,invitationcode,	 Date_Format(invitationcodeexpiration, '%e-%b-%Y') as invitationcodeexpiration from members where uid=:uid",['uid'=>$uid]);
            if(count($results)>0){
                $response["results"]=$results[0];
        
            }
            $response["status"]="202";    
            return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
        }
    }


    
  public function getmembers($uid)
    {
      $response=array(
            'status'=>'',
            'results'=>'',
      );

      try{
       $results=DB::select("Select B.id,A.owner,B.uid, firstname, lastname, email, mobileno,avatar from memberof A,members B  where  A.memberuid=B.uid and A.owner=:owner order by firstname",['owner'=>$uid]);
            $response["results"]=$results;
            $response["status"]="202";    
            return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
        }
    }

    
    public function updateprofile()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
  
            DB::table('members')
                ->where('uid', Input::get('uid'))
                ->where('email', Input::get('email'))
                ->update(['firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'lastname' => Input::get('lastname'),
                'mobileno' => Input::get('mobileno'),
                'datemodified' => date("Y-m-d H:m:s")]);

             $response["status"]="202";    
        
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
         }

    }


    
    
    public function deletemember()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
            $where = array('owner' => Input::get('owneruid'),'memberuid' => Input::get('memberuid'));
            DB::table('memberof')->where($where)->delete();

            $where = array('owner' => Input::get('memberuid'),'memberuid' => Input::get('owneruid'));
            DB::table('memberof')->where($where)->delete();


             $response["status"]="202";    
        
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
         }

    }


    
    public function generateinvititationcode()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {


            $invitationcode = substr(md5(microtime()),rand(0,26),5);
            $invitationcodeexpiration = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));

            DB::table('members')
                ->where('uid', Input::get('uid'))
                ->where('email', Input::get('email'))
                ->update(['invitationcode' => strtoupper($invitationcode),
                'invitationcodeexpiration' => $invitationcodeexpiration]);

             $response["status"]="202";    
        
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]="";
            return $response;
         }

    }

    
    public function addmember()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {

            $results= DB::select("select  Date_Format(invitationcodeexpiration, '%e-%b-%Y') as invitationcodeexpiration, uid from members where invitationcode=:invitationcode",
            ['invitationcode'=>Input::get('invitationcode')]);
        
            if($results>0){
                if($results[0]->uid==Input::get('uid')){
                     $response["status"]="202";
                    $response["results"]="Invalid invitation code";    
                }else{
                      if(date('Y-m-d',strtotime($results[0]->invitationcodeexpiration))< date("Y-m-d")){
                        $response["status"]="202";
                        $response["results"]="Invitation code is already expired";    
                     }else{
                        $response["status"]="202";
                        $response["results"]="";

                        DB::table('memberof')->insert([
                        'owner'=>Input::get('uid'),
                        'memberuid' => $results[0]->uid,
                        'dateadded' => date("Y-m-d H:m:s")]);

                        DB::table('memberof')->insert([
                        'owner'=> $results[0]->uid,
                        'memberuid' =>Input::get('uid'),
                        'dateadded' => date("Y-m-d H:m:s")]);
                     }
                 }
            }else{
                $response["status"]="202";
                $response["results"]="Invalid invitation code";    
                
            }
               
             return $response;

        }catch(\Exception $e){
            $response["status"]="500";
            $response["results"]=$e;
            return $response;
         }

    }


    public function register()
    {
        $response=array(
            'status'=>'',
            'results'=>'',
            );
        try
        {
  
            $invitationcode = substr(md5(microtime()),rand(0,26),5);
            $invitationcodeexpiration = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));

            DB::table('members')->insert([
                'uid'=>Input::get('uid'),
                'firstname' => Input::get('firstname'),
                'middlename' => Input::get('middlename'),
                'lastname' => Input::get('lastname'),
                'email' => Input::get('email'),
                'invitationcode' =>  strtoupper($invitationcode),
                'invitationcodeexpiration' => $invitationcodeexpiration,
                'mobileno' => Input::get('mobileno'),
                'datecreated' => date("Y-m-d H:m:s"),
                'active' => 'Active',
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
