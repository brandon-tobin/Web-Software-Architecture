<?php

/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * New Event Model -- Represents a new event object
 *
 */

require '../../Model/Functions/db.php';

if (isset($_POST['submit'])) {
    $eventName = trim($_REQUEST['title']);
    $eventDate = trim($_REQUEST['date']);
    $eventLocation = trim($_REQUEST['location']);
    $eventDescription = trim($_REQUEST['description']);
    $eventAttend = array();

    foreach ($_POST['attend'] as $names)
    {
        //print "You are selected $names<br/>";
        $eventAttend.array_push($names);
    }

    var_dump($eventAttend);

//    var_dump($eventAttend);
//
//    error_log($eventAttend);



//    $student_ID = $_GET['id'];
//    $advisor = trim($_REQUEST['advisor']);
//    $committee1 = trim($_REQUEST['committee1']);
//    $committee2 = trim($_REQUEST['committee2']);
//    $committee3 = trim($_REQUEST['committee3']);
//    $committee4 = trim($_REQUEST['committee4']);
//    $activity1 = trim($_REQUEST['activity1']);
//    $semester_completed1 = trim($_REQUEST['semester_completed1']);
//    $activity2 = trim($_REQUEST['activity2']);
//    $semester_completed2 = trim($_REQUEST['semester_completed2']);
//    $activity3 = trim($_REQUEST['activity3']);
//    $semester_completed3 = trim($_REQUEST['semester_completed3']);
//    $activity4 = trim($_REQUEST['activity4']);
//    $semester_completed4 = trim($_REQUEST['semester_completed4']);
//    $activity5 = trim($_REQUEST['activity5']);
//    $semester_completed5 = trim($_REQUEST['semester_completed5']);
//    $activity6 = trim($_REQUEST['activity6']);
//    $semester_completed6 = trim($_REQUEST['semester_completed6']);
//    $activity7 = trim($_REQUEST['activity7']);
//    $semester_completed7 = trim($_REQUEST['semester_completed7']);
//    $activity8 = trim($_REQUEST['activity8']);
//    $semester_completed8 = trim($_REQUEST['semester_completed8']);
//    $activity9 = trim($_REQUEST['activity9']);
//    $semester_completed9 = trim($_REQUEST['semester_completed9']);
//    $requirements_met = trim($_REQUEST['requirements_met']);
//    $comments = trim($_REQUEST['comments']);
//
//    // Get highest form number for user
//    $db = openDBConnection();
//
//    // Get the id of the next form
//    $query = "SELECT COUNT(fid) as fid FROM Forms WHERE uid = $student_ID";
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//
//    foreach ($result as $row) {
//        $form_ID = htmlspecialchars($row['fid']) + 1;
//    }
//
//    date_default_timezone_set('America/Denver');
//    $timestamp = time();
//    $date_complete = date("Y-mm-dd", $timestamp);
//
//    // Insert into the forms table
//    $db->beginTransaction();
//    $stmt = $db->prepare("INSERT INTO Forms (fid, uid, date, meets_requirements, progress_description, modified_date) VALUES ($form_ID, $student_ID, CURDATE(),
//              $requirements_met, ?, CURDATE())");
//    $stmt->bindValue(1, $comments);
//    $stmt->execute();
//    $db->commit();
}

class Event
{
    public $author_Name;
    public $author_Username;
    public $author_Organization;

    //public $event_Name;
    //public $event_Location;


    public function __construct($id)
    {
        $this->create_event($id);
    }

    // Method for creating a new event
    function create_event($id)
    {
        try {
            $db = openDBConnection();

            // Get all information required to display the new event creation page
            $query = "SELECT username, User.name, Organizations.name as orgName FROM User INNER JOIN Organizations ON User.orgID = Organizations.orgID where username = '" .$id ."'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->author_Name = htmlspecialchars($row['name']);
                $this->author_Username = htmlspecialchars($row['username']);
                $this->author_Organization = htmlspecialchars($row['orgName']);
            }

        } catch (PDOException $ex) {
            error_log("Tobin bad happened! " . $ex->getMessage());
        }

        return;
    }
}