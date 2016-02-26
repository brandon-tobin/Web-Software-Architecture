<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 2/23/2016
 * Time: 10:08 PM
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../../Model/Functions/db.php';

require ('../../Model/Functions/authentication.php');

//error_log("Made it here!!!!!!! The session role is : " .$_SESSION['roles']);

//redirectToHTTPS();

$role = get_role();

verify_Login($role);

//$role = $_SESSION['roles'];

require ('../../View/Account/account_home.php');