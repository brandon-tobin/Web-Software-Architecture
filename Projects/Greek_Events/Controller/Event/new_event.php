<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * New Event Creater Controller
 *
 */

// Set the include path for the model and view
//set_include_path("../../Model/Student/" .PATH_SEPARATOR . "../../View/Student/");
set_include_path("../../Model/Event/" .PATH_SEPARATOR . "../../View/Event/");

// Require the model file once
require_once 'new_event.php';

// Get the user id out of the url
$id = $_GET['id'];

// Create a new student form object
$event = new event($id);

// Require the form view for display
//require "new_event.php";

?>
