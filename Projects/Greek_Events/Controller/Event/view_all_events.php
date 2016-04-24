<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * View Event Controller
 *
 */

// Set the include path for the model and view
set_include_path("../../Model/Event/" .PATH_SEPARATOR . "../../View/Event/");

// Require the model file once
require_once 'view_all_events.php';

// Get the user name out of the url
$id = $_GET['id'];

// Create a new student form object
$event = new ViewAllEvents($id);

// Require the form view for display
require "view_all_events_view.php";

?>
