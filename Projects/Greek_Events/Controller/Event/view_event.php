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
require_once 'view_event.php';

// Get the user name out of the url
$id = $_GET['id'];

// Get the event id out of the url
$eid = $_GET['event'];


// Create a new student form object
$event = new ViewEvent($id, $eid);

// Require the form view for display
require "view_event_view.php";

?>
