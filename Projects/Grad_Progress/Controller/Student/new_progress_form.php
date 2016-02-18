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
require_once 'new_progress_form.php';

// Get the id out of the url
$id = $_GET['id'];
//$fid = $_GET['form'];

// Create a new student form object
$form = new New_Student_Form($id);

// Require the form view for display
//require "new_progress_form_view.php";

?>
