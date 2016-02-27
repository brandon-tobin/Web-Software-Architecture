<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Progress Forms Controller
 *
 */

// Set the include path for the model and view
set_include_path("../../Model/Student/" .PATH_SEPARATOR . "../../View/Student/");

// Require the model file once
require_once 'student_status_update.php';

// Get the id out of the url
$id = $_GET['id'];

// Create a new student form object
$status = new New_Student_Status_Update($id);

// Require the form view for display
require "student_status_update_view.php";

?>
