<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 2/23/2016
 * Time: 10:08 PM
 */

require ('../../Model/Functions/authentication.php');

error_log("Made it here!!!!!!!");

//redirectToHTTPS();

verify_Login('user');

//$role = $_SESSION['roles'];

require ('../../View/Account/account_home.php');