<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 12:12 PM
 */

require_once ('../../Model/Functions/authentication.php');

getUserInfo();

unset($_SESSION['login']);
unset($_SESSION['realname']);
unset($_SESSION['role']);

session_unset();
changeSessionID();

error_log("ANNE: session login {$_SESSION['login']}");
error_log("ANNE: session name {$_SESSION['realname']}");
error_log("ANNE: session role {$_SESSION['role']}");

require('../../View/User/logout_view.php');

