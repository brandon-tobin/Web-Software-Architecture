<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Advisor for showing list of students Controller
 *
 */

// Set the include path for the model and view
set_include_path("../../Model/Advisor/" .PATH_SEPARATOR . "../../View/Advisor/");

// Require the model file once
require_once 'advisor.php';

// Get the id out of the url
$id = $_GET['id'];

// Create a new advisor object
$advisor = new Advisor($id);

// Require the advisor view for display
require "students_view.php";

?>