<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * DGS for showing list of students and advisors Controller
 *
 */

// Set the include path for the model and view
set_include_path("../../Model/DGS/" .PATH_SEPARATOR . "../../View/DGS/");

// Require the model file once
require_once 'dgs.php';

// Create a new advisor object
$dgs = new DGS();

// Require the advisor view for display
require "overview_view.php";
