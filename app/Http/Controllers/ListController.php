<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Parser;

class ListController extends Controller
{

    function getLists($id ): \Illuminate\Http\JsonResponse
    {
        $lists = \Illuminate\Support\Facades\DB::table('user_list')->where('Member_id','=',$id)->get();
        return response()->json([$lists]);
    }
    function addLists(Request $request )
    {
        $list_name = $request->get('list_name');
        $user = $request->get("user_id");
      //  DB::insert('insert into user_list (Name,Member_id) values (?,?)',[$list_name,$user]);
        $list_id=DB::table('user_list')->insertGetId(['Name'=>$list_name,'created_at'=>now(),'updated_at'=>now(),'Member_id'=>$user]);
        $response = ['message' => 'You have been successfully add lists!','id'=>$list_id];
        return response($response, 200);

    }
    function deleteLists(Request $request )
    {
        $id = $request->get('list_id');
        DB::table('user_list')->where('id','=',$id)->delete();
        $response = ['message' => 'You have been successfully add lists!'];
        return response($response, 200);

    }

}
