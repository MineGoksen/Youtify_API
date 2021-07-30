<?php

namespace App\Http\Controllers\admin;

class AdminController
{
    function show()
    {
        echo '<a href ="/selection"> Kullanıcı Ekleme<a/>';
    }

    function selection()
    {
        return "iyi secim";
    }
}
