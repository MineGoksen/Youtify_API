<?php


namespace App\Http\Controllers;


class ProductController extends Controller
{
    function show($id)
    {
        $categories=['category 1','category 2','category 3'];

       // return view('product',['id'=>$id]);
        return  view('product',compact('categories','id'));
    }

}
