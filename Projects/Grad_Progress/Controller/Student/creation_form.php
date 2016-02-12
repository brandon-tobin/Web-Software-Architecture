<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Creation Controller
 *
 */

// Set the include path for the model and view
set_include_path("../../Model/Student/" .PATH_SEPARATOR . "../../View/Student/");

// Require the model file once
require_once 'student.php';

// Get the id out of the url
$id = $_GET['id'];

// Create a new student object
$student = new Student($id);

// Require the student_forms view for display
require "student_forms_view.php";

?>
