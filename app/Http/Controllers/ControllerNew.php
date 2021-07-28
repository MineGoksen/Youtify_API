<?php

namespace App\Http\Controllers;

class ControllerNew extends Controller
{
    function show($id, $type='heyy')
    {
        return "ismim $id seninki $type";
    }
}
