<?php
/**
 * Created by PhpStorm.
 * User: Tobin
 * Date: 2/23/2016
 * Time: 3:52 PM
 */

function usingHTTPS()
{
    return isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] != "off");
}

function redirectToHTTPS()
{
    if (!usingHTTPS())
    {
        $redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        header("Location:$redirect");
        exit();
    }
}