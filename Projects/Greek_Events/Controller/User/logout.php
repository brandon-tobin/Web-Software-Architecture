<?php
/**
 * User: Fumiko Aoki
 * Date: Spring 2016
 *
 * Logout Controller
 *
 */

require_once ('../../Model/Functions/authentication.php');

getUserInfo();

// Unset all of the user's information
unset($_SESSION['login']);
unset($_SESSION['realname']);
unset($_SESSION['role']);

session_unset();
changeSessionID();

require('../../View/User/logout_view.php');

