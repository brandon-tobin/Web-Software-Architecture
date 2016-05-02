<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 3:23 AM
 */


require_once ("../../Model/User/home.php");

// Get the user name out of the url
$id = $_GET['id'];

// Create a new student form object
$events = new home($id);