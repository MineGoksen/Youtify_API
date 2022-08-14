<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Parser;

class ListController extends Controller
{

    function getLists($id )
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
        DB::table('list_song')->where('List_id','=',$id)->delete();
        DB::table('user_list')->where('id','=',$id)->delete();
        $response = ['message' => 'You have been successfully add lists!'];
        return response($response, 200);

    }
    function getListSongs(Request $request ): JsonResponse
    {
        $id = $request->get('list_id');
        $songs=DB::table('list_song')
            ->join('song', 'list_song.Song_id', '=', 'song.Song_id')
            ->where('List_id','=',$id)->get();
        return response()->json([$songs]);

    }

}
