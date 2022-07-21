<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    function signUp(Request $request )
    {
        $f_name = $request->get('first_name');
        $l_name = $request->get('last_name');
        $user_name = $request->get('user_name');
        $email = $request->get('email');
        $password = $request->get('password');
        $member_id=DB::table('member')->insertGetId(['Fname'=>$f_name,'Lname'=>$l_name,'email'=>$email
            ,'password'=>$password,'created_at'=>now(),'updated_at'=>now()]);
        DB::table('user')->insert(['id'=>$member_id ,'user_name'=>$user_name]);
        $response = ['message' => 'You have been successfully add user!'];
        return response($response, 200);

    }
    function logIn(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $user_id = DB::table('member')->where('email','=',$email)
            ->where('password','=',$password)->get('id');
        $response = ['message' => 'You have been successfully add user!','id'=>$user_id];
        return response($response, 200);
    }
}
