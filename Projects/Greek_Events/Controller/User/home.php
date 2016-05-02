<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 3:23 AM
 */


require_once ("../../Model/User/home.php");

// Get the user name out of the url
$id = $_SESSION['login'];

// Create a new student form object
$events = new home($id);

$name = $_SESSION['realname'];

require_once ("../../View/User/home_view.php");