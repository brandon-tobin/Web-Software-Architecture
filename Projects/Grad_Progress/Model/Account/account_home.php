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

error_log("Made it here!!!!!!!");

//redirectToHTTPS();

verify_Login('dgs');

//$role = $_SESSION['roles'];

require ('../../View/Account/account_home.php');