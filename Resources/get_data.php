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

if ($formType == 'gpa')
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
        $query = "SELECT gpa FROM Students ORDER BY gpa ASC";
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
        $gpa_chart_data->name = "Student GPAs";
        $gpa_chart_data->data = [];
        for ($i=0;$i<count($results);$i++)
        {
            $gpa_chart_data->data [] = (float)$results[$i]['gpa'];
        }
        sort( $gpa_chart_data->data );
        $gpa_chart_data = json_encode($gpa_chart_data);


        echo "
        <script>
        $('#columnchart').highcharts({
    chart: { type:'column'},
    title: {
      text: 'GPAs',
	x: -20 //center
        },
      subtitle: {
      text: 'Source: Jim',
	x: -20
        },
      xAxis: {
      title: 'credit_hours',
        },
      yAxis: {
      min:0,max:4,
      title: {
	text: 'GPA'
	  },
	plotLines: [{
	  value: 0,
	    width: 1,
	    color: '#808080'
            }]
        },
      legend: {
      layout: 'vertical',
	align: 'right',
	verticalAlign: 'middle',
	borderWidth: 0
        },
      series: [ $gpa_chart_data ]
      });
</script>";

    }
    catch (PDOException $ex)
    {
        $output .= "<p>oops</p>";
        $output .= "<p> Code: {$ex->getCode()} </p>";
        $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
        $output .= "<pre>$ex</pre>";
    }








}

if ($formType == 'advisor')
{
    echo "<p> " . htmlspecialchars("GETTING Advisor CHART!") . "</p>";
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


