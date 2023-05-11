<?php
function UploadImage($path,$img)
{
    $Extension=$img->getClientOriginalExtension();
    $DocumentName= uniqid().'.'.$Extension;
    $img->move(public_path('assets/images/'.$path), $DocumentName);
    return ($DocumentName);
}
