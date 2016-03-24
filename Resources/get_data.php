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

//session_start();

$formType = trim($_REQUEST['formlist']);

error_log("TOBIN FORMTYPE = " . $formType );

if ($formType == '1')
{
    //echo "<p> " . htmlspecialchars("GETTING GPA CHART!") . "</p>";

    $server_name  = 'localhost';
    $db_user_name = 'Grad_Application';
    $db_password  = '173620901';
    $db_name      = 'Grad_Prog_V6';
    try
    {
        //
        // The main content of the page will be in this variable
        //
        $output = "";

        //
        // Connect to the data base and select it.
        //
        $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //$query = "SELECT gpa FROM Students ORDER BY gpa ASC";
        $query = "select gpa, count(*) as count from Students group by gpa order by gpa asc";
        $statement = $db->prepare( $query );
        $statement->execute(  );

        //
        // Fetch all the results
        //
        $results    = $statement->fetchAll(PDO::FETCH_ASSOC);

        //
        // GPA Column Chart
        //

        $gpa_chart_data = new stdClass();
        $gpa_chart_data->name = "GPAS";
        $gpa_chart_data->data = [];
        for ($i=0;$i<count($results);$i++)
        {
            $gpa_chart_data->data [] = array((float)$results[$i]['gpa'], (float)$results[$i]['count']);
        }
        sort( $gpa_chart_data->data );
        $gpa_chart_data = json_encode($gpa_chart_data);

        print $gpa_chart_data;

    }
    catch (PDOException $ex)
    {
        $output .= "<p>oops</p>";
        $output .= "<p> Code: {$ex->getCode()} </p>";
        $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
        $output .= "<pre>$ex</pre>";
    }
}

if ($formType == '2')
{
    $server_name  = 'localhost';
    $db_user_name = 'Grad_Application';
    $db_password  = '173620901';
    $db_name      = 'Grad_Prog_V6';
    try
    {
        //
        // The main content of the page will be in this variable
        //
        $output = "";

        //
        // Connect to the data base and select it.
        //
        $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //$query = "SELECT gpa FROM Students ORDER BY gpa ASC";
        $query = "select name, count from Users, (select aid, count(*) as count from Advisors group by aid) as temp where Users.uid = temp.aid";
        $statement = $db->prepare( $query );
        $statement->execute(  );

        //
        // Fetch all the results
        //
        $results    = $statement->fetchAll(PDO::FETCH_ASSOC);

        //
        // Adviser Student Count
        //

        $gpa_chart_data = new stdClass();
        $gpa_chart_data->name = "Students";
        $gpa_chart_data->data = [];
        for ($i=0;$i<count($results);$i++)
        {
            $gpa_chart_data->data [] = array($results[$i]['name'], $results[$i]['count']);
        }
        sort( $gpa_chart_data->data );
        $gpa_chart_data = json_encode($gpa_chart_data);

        print $gpa_chart_data;

    }
    catch (PDOException $ex)
    {
        $output .= "<p>oops</p>";
        $output .= "<p> Code: {$ex->getCode()} </p>";
        $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
        $output .= "<pre>$ex</pre>";
    }
}

if ($formType == '3') {
    $server_name = 'localhost';
    $db_user_name = 'Grad_Application';
    $db_password = '173620901';
    $db_name = 'Grad_Prog_V6';
    try {
        //
        // The main content of the page will be in this variable
        //
        $output = "";

        //
        // Connect to the data base and select it.
        //
        $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //$query = "SELECT gpa FROM Students ORDER BY gpa ASC";
        $query = "select name, count from Users, (select sid, activity, count(*) as count FROM Activities group by sid) as temp where Users.uid = temp.sid";
        $statement = $db->prepare($query);
        $statement->execute();

        //
        // Fetch all the results
        //
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        //
        // Student Activity Completion Chart
        //

        $gpa_chart_data = new stdClass();
        $gpa_chart_data->name = "Activities";
        $gpa_chart_data->data = [];
        for ($i = 0; $i < count($results); $i++) {
            $gpa_chart_data->data [] = array($results[$i]['name'], $results[$i]['count']);
        }
        sort($gpa_chart_data->data);
        $gpa_chart_data = json_encode($gpa_chart_data);

        print $gpa_chart_data;

    } catch (PDOException $ex) {
        $output .= "<p>oops</p>";
        $output .= "<p> Code: {$ex->getCode()} </p>";
        $output .= " <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
        $output .= "<pre>$ex</pre>";
    }
}





















//if (isset($_SESSION['count']))
//{
//    $_SESSION['count']++;
//}
//else
//{
//    $_SESSION['count'] = 1;
//}
//
//$count = $_SESSION['count'];
//echo " <h1> AJAX has responded! For the $count time</h1>";
//
//if (isset($_REQUEST['message']))
//{
//    $message = $_REQUEST['message'];
//
//    echo "<p> " . htmlspecialchars($message) . "</p>";
//}
//
//if (isset($_REQUEST['show_origination']))
//{
//    $orig = $_SERVER['HTTP_REFERER'];
//
//    echo "<p> AJAX request came from: $orig </p>";
//}


