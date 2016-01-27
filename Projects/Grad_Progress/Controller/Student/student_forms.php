<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms Controller
 *
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

set_include_path("../../Model/Student/" .PATH_SEPARATOR . "../../View/Student/");

require_once 'student.php';

$id = $_GET['id'];

$student = new Student($id);

require "student_forms_view.php";

?>
