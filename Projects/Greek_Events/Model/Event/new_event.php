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

//    var_dump($eventName);
//    var_dump($eventDate);
//    var_dump($eventLocation);
//    var_dump($eventDescription);


    foreach ($_POST['attend'] as $names)
    {
        array_push($eventAttend, $names);
    }

    $db = openDBConnection();

    // Get the id of the next event
    $query = "SELECT COUNT(eventID) as eventID FROM Event";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $eventID = htmlspecialchars($row['eventID']) + 1;
    }

    // Insert into the event table
    $db->beginTransaction();
    $stmt = $db->prepare("INSERT INTO Event (name, date, description, location) values (?, ?, ?, ?)");
    $stmt->bindValue(1, $eventName);
    $stmt->bindValue(2, $eventDate);
    $stmt->bindValue(3, $eventDescription);
    $stmt->bindValue(4, $eventLocation);
    $stmt->execute();
    $db->commit();

    $db->beginTransaction();
    // Insert into the permissions table
    for ($i = 0; $i < count($eventAttend); $i++)
    {
//        var_dump($eventID);
//        var_dump($eventAttend[$i]);
        $stmt = $db->prepare("INSERT INTO EventPermission VALUES (?, ?)");
        $stmt->bindValue(1, $eventID);
        $stmt->bindValue(2, $eventAttend[$i]);
        $stmt->execute();
    }

    $db->commit();
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