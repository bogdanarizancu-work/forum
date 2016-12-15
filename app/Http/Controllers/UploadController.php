<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input, File;

class UploadController extends Controller
{
    //
    public function uploadSingleFile()
    {
        $input = Input::all();

        if (! $input['file'])
        {
            return response()->json('error', 400);
        }

        $file = $input['file'];

        $name = str_replace(' ', '_', strtolower($file->getClientOriginalName())); //change spaces and set all chars to lowercase
        $extension = File::extension($name);

        // check that temp folder exists
        checkTempDirectory();

        //move the file in the temporary directory
        $path = public_path()."/uploads/temp";

        //check if filename already exists
        while(File::exists($path.'/'.$name))
        {
            $ext = File::extension($path.'/'.$name);
            $name = substr($name, 0, strrpos($name, '.')).'('.str_random(2).').'.$ext;
        }

        if (! $file->move($path, $name))
        {
             return response()->json('error', 400);
        }

        return response()->json(['filename' => $name]);
    }
}
