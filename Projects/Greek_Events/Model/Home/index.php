<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 4/29/2016
 * Time: 3:33 PM
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
        $usernameError = 'Enter your username.';
        $error = true;
        error_log("ANNE: MISSING LOGIN");
    }
    // Complain if password is missing
    else if ($password == '') {
        $passwordError = 'Enter your password.';
        $error = true;
        error_log("ANNE: MISSING PW");
    }

    if($error)
    {
        require_once ("../../View/Home/index.php");
    }
    if (verify_Login(""))
    {
        require_once ('../../View/User/success_view.php');
    }
}
else
{
    require_once ('../../View/Home/index.php');
}