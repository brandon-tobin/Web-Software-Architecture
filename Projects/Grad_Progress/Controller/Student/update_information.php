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
require_once 'update_information.php';

// Create a new update information object
$info = new Update_Info();

// Require the form view for display
require "update_information_view.php";

?>
