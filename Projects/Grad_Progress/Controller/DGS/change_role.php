<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * DGS for changing user roles
 *
 */

// Set the include path for the model and view
set_include_path("../../Model/DGS/" .PATH_SEPARATOR . "../../View/DGS/");

// Require the model file once
require_once 'change_role.php';

// Create a new advisor object
$dgs = new User_Roles();

// Require the advisor view for display
require "change_role_view.php";
