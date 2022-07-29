<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request )
    {
        $search = $request->get('search');
        $posts = DB::table('song')
            ->where('Name', 'ilike', "%{$search}%")
            ->get();
        $response = ['message' => 'You have been successfully search!',"songs"=>$posts];
        return response($response, 200);

    }
}
