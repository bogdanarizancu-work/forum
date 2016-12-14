<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function upload()
    {
        echo '<pre>'; print_r(input()); echo '</pre>'; die();
    }
}
