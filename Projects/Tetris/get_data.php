<?php
/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 3/31/2016
 * Time: 3:27 PM
 */

$verify_ajax = true;

var_dump("FUCK");


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

        $query = "INSERT INTO Score VALUES({$_REQUEST['name']}, {$_REQUEST['scoreValue']});";
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