<?php

 function checkDirectory($path = '')
{
    if(!empty($path)){
        if(!File::isDirectory($path)){
            File::makeDirectory($path);
        }
    }

    @chmod($path, 0777);
    return true;
}

function checkTempDirectory()
{
    checkDirectory(public_path().'/uploads/');
    checkDirectory(public_path().'/uploads/temp/');

    return public_path().'/uploads/temp/';
}
