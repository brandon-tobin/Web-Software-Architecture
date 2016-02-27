<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * The view for displaying the logout
 *
 */

require ('../../Model/Functions/db.php');
require ('../../Model/Functions/authentication.php');
require ('../../View/Partials/partial_view.php');

session_start();

unset($_SESSION['userid']);
unset($_SESSION['realname']);
unset($_SESSION['login']);
unset($_SESSION['roles']);

header("Location: ../home.php");

?>
