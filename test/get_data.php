<?php

/**
 *
 *  Author: H. James de St. Germain
 *  Date:   Spring 2014
 *
 *  Return something for use by ajax call
 *
 */

$verify_ajax = true;

//
// AJAX check
//
if($verify_ajax &&
   (empty($_SERVER['HTTP_X_REQUESTED_WITH']) ||
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'))
  {
    echo "<p>You are not AJAX</p>";
    die();
  }


session_start();
  
if (isset($_SESSION['count']))
  {
    $_SESSION['count']++;
  }
else
  {
    $_SESSION['count'] = 1;
  }
$count = $_SESSION['count'];
echo
"
  <h1> AJAX has responded! For the $count time</h1>    
";
  
if (isset($_REQUEST['message']))
  {
    $message = $_REQUEST['message'];
      
    echo "<p> " . htmlspecialchars($message) . "</p>";
  }
  
if (isset($_REQUEST['show_origination']))
  {
    $orig = $_SERVER['HTTP_REFERER'];
      
    echo "<p> AJAX request came from: $orig </p>";
  }



