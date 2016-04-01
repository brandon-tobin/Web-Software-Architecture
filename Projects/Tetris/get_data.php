<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 3/31/2016
 * Time: 3:27 PM
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

$formType = trim($_REQUEST['formlist']);

// Check to see if the selected chart is the GPA Column Chart
// If so, get the required data for the chart
if ($formType == '1')
{
    $server_name  = 'uofu-cs4540-6.westus.cloudapp.azure.com';
    $db_user_name = 'faoki';
    $db_password  = '628732387';
    $db_name      = 'Tetris';
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
        $query = "SELECT * FROM Score order by score desc limit 5;";
        $statement = $db->prepare( $query );
        $statement->execute(  );

        //
        // Fetch all the results
        //
        $results    = $statement->fetchAll(PDO::FETCH_ASSOC);

        scoreTable($results);

        echo"
        <form method='post' onsubmit=\"find_data()\">
            <p><b>Name:</b><input type=\"text\" name=\"name\" id=\"name\" /></p>
            <input type=\"submit\" name='submit' value='Submit Score'/>
        </form>";
    }
    catch (PDOException $ex)
    {
        $output .= "<p>oops</p>";
        $output .= "<p> Code: {$ex->getCode()} </p>";
        $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
        $output .= "<pre>$ex</pre>";
    }
}

// Check to see if the selected chart is the Advisor Student Count Chart
// If so, get the required data for the chart
if ($formType == '2')
{
    $server_name  = 'uofu-cs4540-6.westus.cloudapp.azure.com';
    $db_user_name = 'faoki';
    $db_password  = '628732387';
    $db_name      = 'Tetris';
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
        $query = "INSERT INTO Score VALUES({$_REQUEST['name']}, globalScore);";
        $statement = $db->prepare( $query );
        $statement->execute(  );

        $db->commit();

        $query = "SELECT * FROM Score order by score desc limit 5;";
        $statement = $db->prepare( $query );
        $statement->execute(  );

        //
        // Fetch all the results
        //
        $results    = $statement->fetchAll(PDO::FETCH_ASSOC);

        scoreTable($results);

    }
    catch (PDOException $ex)
    {
        $output .= "<p>oops</p>";
        $output .= "<p> Code: {$ex->getCode()} </p>";
        $output .=" <p> See: dev.mysql.com/doc/refman/5.0/en/error-messages-server.html#error_er_dup_key";
        $output .= "<pre>$ex</pre>";
    }
}

// Check to see if the selected chart is the Student Activity Completion Chart
// If so, get the required data for the chart
if ($formType == '3') {
    $server_name  = 'uofu-cs4540-6.westus.cloudapp.azure.com';
    $db_user_name = 'faoki';
    $db_password  = '628732387';
    $db_name      = 'Tetris';
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
        $gpa_chart_data->name = "Activities Completed";
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

function scoreTable($results)
{
    echo"
        <p>Top Five Scores</p>
        <table>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>";


    foreach ($results as $r)
    {
        echo"
            <tr>
                <td>{$r['Name']}</td>
                <td>{$r['Score']}</td>
            </tr>";
    }
    echo"
        </table>
        ";
}