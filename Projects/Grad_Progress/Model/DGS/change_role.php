<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Model to allow the DGS to change the role of a user.
 *
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

require '../../Model/Functions/db.php';

require '../../Model/Functions/authentication.php';

verify_Login('dgs');

/*if (isset($_POST['submit']))
{
    $student_ID = $_GET['id'];
    $form_ID = $_GET['form'];
    $updated_date1 = trim($_REQUEST['updated_date1']);
    $updated_date2 = trim($_REQUEST['updated_date2']);
    $updated_date3 = trim($_REQUEST['updated_date3']);
    $updated_date4 = trim($_REQUEST['updated_date4']);
    $updated_date5 = trim($_REQUEST['updated_date5']);
    $updated_date6 = trim($_REQUEST['updated_date6']);
    $updated_date7 = trim($_REQUEST['updated_date7']);
    $updated_date8 = trim($_REQUEST['updated_date8']);
    $updated_date9 = trim($_REQUEST['updated_date9']);
    $requirements_met = trim($_REQUEST['requirements_met']);
    $comments = trim($_REQUEST['comments']);


    // Create a DB connection
    $db = openDBConnection();

    // Get original form date
    $query = "SELECT date, student_signed, student_signed_date, advisor_signed, advisor_signed_date FROM Forms WHERE uid = $student_ID AND fid = $form_ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $form_Date = $row['date'];
        $student_signed = $row['student_signed'];
        $student_signed_date = $row['student_signed_date'];
        $advisor_signed = $row['advisor_signed'];
        $advisor_signed_date = $row['advisor_signed_date'];
    }

    // Set the timezone
    date_default_timezone_set('America/Denver');

    // Insert into the forms table
    $db->beginTransaction();
    $stmt = $db->prepare("INSERT INTO Forms (fid, uid, date, meets_requirements, progress_description, modified_date, student_signed, student_signed_date, advisor_signed, advisor_signed_date)
                          VALUES ($form_ID, $student_ID, '". $form_Date."', $requirements_met, ?, CURDATE(), $student_signed, '". $student_signed_date ."', $advisor_signed, '". $advisor_signed_date ."')");
    $stmt->bindValue(1, $comments);
    $stmt->execute();
    $db->commit();

    // Insert into the activities table
    error_log("TOBIN updated_date1 contains : " .$updated_date1);
    if ($updated_date1 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 1, \"$updated_date1\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date2 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 2, \"$updated_date2\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date3 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 3, \"$updated_date3\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date4 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 4, \"$updated_date4\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date5 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 5, \"$updated_date5\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date6 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 6, \"$updated_date6\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date7 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 7, \"$updated_date7\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date8 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 8, \"$updated_date8\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date9 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 9, \"$updated_date9\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
}*/

class User_Roles
{
    public $username;
   // public $role;

    // Constructor
    public function __construct()
    {
        $this->create_roles();
    }

    // Method for creating student form
    function create_roles()
    {
        try {
            $db = openDBConnection();

            // Query the database to find out which advisor is related to this student.
            $query = "SELECT username, role FROM Roles)";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->username = array();
            foreach ($result as $row) {
                $this->username[] = array($row['username'], $row['role']);
               // $this->role[] = $row['role'];
            }
        }
        catch (PDOException $ex) {
        }
    }
}
