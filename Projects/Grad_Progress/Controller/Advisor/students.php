<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student List Controller
 *
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

set_include_path("../../Model/Advisor/" .PATH_SEPARATOR . "../../View/Advisor/");

require_once 'advisor.php';

$id = $_GET['id'];

$advisor = new Advisor($id);

require "students_view.php";

?>