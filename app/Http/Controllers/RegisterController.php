<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    function signUp(Request $request)
    {
        $f_name = $request->get('first_name');
        $l_name = $request->get('last_name');
        $user_name = $request->get('user_name');
        $email = $request->get('email');
        $password = $request->get('password');
        $email_unique = DB::table('member')->where('email', '=', $email)->exists();
        $username_unique = DB::table('user')->where('user_name', '=', $user_name)->exists();
        if ($email_unique) {
            $response = ['message' => 'Bu email daha önce kullanılmış!'];
            return response($response, 300);
        } else if ($username_unique) {
            $response = ['message' => 'Bu kullanıcı adı daha önce kullanılmış!'];
            return response($response, 300);
        } else {
            $member_id = DB::table('member')->insertGetId(['Fname' => $f_name, 'Lname' => $l_name, 'email' => $email
                , 'password' => $password, 'created_at' => now(), 'updated_at' => now()]);
            DB::table('user')->insert(['id' => $member_id, 'user_name' => $user_name]);
            $response = ['message' => 'You have been successfully add user!'];
            return response($response, 200);
        }
    }

    function logIn(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $user = DB::table('member')->where('email', '=', $email)
            ->where('password', '=', $password);
        if ($user->exists()) {
            $user_id = DB::table('member')->where('email', '=', $email)
                ->where('password', '=', $password)->get('id');
            $manager=DB::table('manager')->where('id', '=', $user_id[0]->id)->exists();
            if ($manager){
                $response = ['message' => 'You have been successfully add user!', 'id' => $user_id[0]->id,'manager'=>true];
            }
            else{
                $response = ['message' => 'You have been successfully add user!', 'id' =>$user_id[0]->id,
                    'manager'=>false];
            }

            return response($response, 200);
        } else {
            $user_exists = DB::table('member')->where('email', '=', $email)->exists();
            if ($user_exists) {
                $response = ['message' => 'Şifre yanlış!'];
            } else {
                $response = ['message' => 'Bu email ile bir kullanıcı bulunmaktadır !'];
            }
            return response($response, 300);
        }

    }
}
