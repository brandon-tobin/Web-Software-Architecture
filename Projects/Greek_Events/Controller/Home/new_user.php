<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 4/15/2016
 * Time: 1:03 AM
 */

//set_include_path("../../Model/Home/" .PATH_SEPARATOR . "../../View/Home/");
set_include_path("../../View/Home/");

// Require the model file once
//require_once 'new_user.php';

// Require the form view for display
require "new_user_creation_view.php";

require "../../Model/authenticate.php";

set_include_path( "../../Model/" .PATH_SEPARATOR .
    "../../View/Home/");

include_once 'db_config.php';

//redirectToHTTPS();


$error = false;
if(isset($_POST['submit'])) {

    $userType = trim($_REQUEST ['user_type']);
    $name = trim($_REQUEST ['name']);
    $uid = trim($_REQUEST ['uid']);
    $password = trim($_REQUEST ['password']);
    $cpassword = trim($_REQUEST ['cpassword']);

    // Complain if name is missing
    if ($name == '') {
        $nameError = 'Enter your name.';
        $error = true;
        error_log("ANNE: MISSING NAME");
    }

    // Complain if name is missing
    if ($password == '') {
        $passwordError = 'Pick a password.';
        $error = true;
        error_log("ANNE: MISSING PW");
    }
    else if (strlen($password) < 8)
    {
        $passwordError = "Password is too short.";
        $error = true;
        error_log("ANNE: PW TOO SHORT");
    }

    // Complain if login is missing
    if ($uid == '') {
        $uIDError = 'Enter your uID.';
        $error = true;
        error_log("ANNE: MISSING UID");
    }

    if ($password != $cpassword)
    {
        $cpasswordError = "Password fields do not match.";
        $error = true;
        error_log("ANNE: PW DONT MATCH");
    }



    if ($error)
    {
        error_log("ANNE: MAKES IT TO ERROR");
        require "new_user_form_view.php";
    }
    else {

        error_log("Anne: made it to else.");
        if ($userType == "S") {
            if (isset($_REQUEST['degree']) && isset($_REQUEST['track']) && isset($_REQUEST['admitted']) && isset($_REQUEST['advisor'])) {
                $degree = trim($_REQUEST['degree']);
                $track = trim($_REQUEST['track']);
                $admitted = trim($_REQUEST['admitted']);
                $advisor = trim($_REQUEST['advisor']);

                if (createStudent($uid, $degree, $track, $admitted, $advisor)) {
                    if (createUser($uid, $name, $userType, $password))
                        require_once "new_user_success_view.php";
                    else
                        require "new_user_form_view.php";
                } else
                    require "new_user_form_view.php";

            }
        } else {
            if (createUser($uid, $name, $userType, $password))
                require_once "new_user_success_view.php";
            else
                require "new_user_form_view.php";
        }

    }

}
else if(isset($_POST['cancel'])) {
    require_once "index_view.php";
}
else
{
    require "new_user_form_view.php";
}

?>