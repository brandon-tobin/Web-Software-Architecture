<?php
/**
 * User: Fumiko Aoki
 * Date: Spring 2016
 *
 * Model logic for allowing a user to login to their account.
 *
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

getUserInfo();

if(isset($_POST['submit']))
{
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $error = false;

    // Complain if login is missing
    if ($username == '') {
        $message = 'Enter your username.';
        $error = true;
    }
    // Complain if password is missing
    else if ($password == '') {
        $message = 'Enter your password.';
        $error = true;
    }

    if($error)
    {
        require_once ("../../View/Home/index.php");
    }
    else if (verify_Login(""))
    {
        require_once ('../../View/User/success_view.php');
    }
    else
    {
        require_once ('../../View/Home/index.php');
    }
}
else
{
    require_once ('../../View/Home/index.php');
}