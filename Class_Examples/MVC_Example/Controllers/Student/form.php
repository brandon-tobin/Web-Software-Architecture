<?php

/**
 * Author: H. james de St. Germain
 * Date: Spring 2016
 *
 * Simple example of MVC
 *
 */


set_include_path( "../../Models/Student/" .PATH_SEPARATOR .
		  "../../Views/");

require_once 'form.php';

$id = $_GET['id'];

$form = new Form( $id );


require "Student/form_view.php";

?>

