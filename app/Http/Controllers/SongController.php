<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    function Comment(Request $request)
    {
        $comment = $request->get('comment');
        $user_name = $request->get('user_name');
        $song_id = $request->get('song_id');
        $exists=DB::table('user_song')->where('User_name', '=', $user_name)->
        where('Song_id', '=', $song_id)->exists();
        if(!$exists){
            DB::table('user_song')->insert(['Comment_text' => $comment, 'User_name' => $user_name
                , 'Song_id' => $song_id, 'created_at' => now(), 'updated_at' => now(), 'Like' => 0]);
            $response = ['message' => 'You have been successfully add comment!'];
            return response($response, 200);
        }
        else{
            DB::table('user_song')->where('User_name', '=', $user_name)->
            where('Song_id', '=', $song_id)->update(['Comment_text' => $comment,
                'updated_at' => now(), 'Like' => 0]);
            $response = ['message' => 'You have been successfully updated comment!'];
            return response($response, 200);
        }
    }

    function like(Request $request)
    {
        $user_name = $request->get('user_name');
        $song_id = $request->get('song_id');

        $like = DB::table('user_song')->where('User_name', '=', $user_name)->
        where('Song_id', '=', $song_id)->get('Like');

        DB::table('user_song')->where('User_name', '=', $user_name)->
        where('Song_id', '=', $song_id)->update(['Like' => !($like[0]->Like)]);
        $response = ['message' => 'You have been successfully add song!'];
        return response($response, 200);

    }

    function song(Request $request )
    {
        $type = $request->get('type');
        $name = $request->get('name');
        $Artist_Fname = $request->get('Artist_Fname');
        $Artist_Lname = $request->get('Artist_Lname');
        $AlbumName = $request->get('AlbumName');
        $AlbumDate = $request->get('AlbumDate');
        $Url = $request->get('url');
        $album=DB::table('album')->where('Name','=',$AlbumName)->
        where('Date','=',$AlbumDate)->exists();
        if(!$album){
            DB::table('album')->insert(['Name'=>$AlbumName,'Date'=>$AlbumDate,'created_at'=>now(),'updated_at'=>now()]);
        }
        $music=DB::table('song')->insert(['Type'=>$type,'Name'=>$name
            ,'Artist_fname'=>$Artist_Fname,'Artist_lname'=>$Artist_Lname,
            'Album_name'=>$AlbumName,'Album_date'=>$AlbumDate,'url'=>$Url,'created_at'=>now(),'updated_at'=>now()]);

        $response = ['message' => 'You have been successfully add song!'];
        return response($response, 200);

    }


}
