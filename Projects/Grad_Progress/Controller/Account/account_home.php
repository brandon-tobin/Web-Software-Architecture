<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 2/23/2016
 * Time: 10:08 PM
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Set the include path for the model and view
set_include_path("../../Model/Account/");

// Require the model file once
require_once 'account_home.php';
