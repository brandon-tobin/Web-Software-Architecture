<?php

/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * View Event Model -- Retrieves the Event From the Database
 *
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

verify_Login();


// Update RSVP for event -- Attending
if (isset($_POST['Attending']))
{
    $eventID = $_GET['event'];
    $username = $_SESSION['login'];

    try {
        $db = openDBConnection();

        $query = "UPDATE Attending SET rsvp = 1 WHERE eventID = ? AND username = ?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $eventID);
        $stmt->bindValue(2, $username);
        $stmt->execute();
    }
    catch (PDOException $ex) {
        error_log("Tobin bad happened! " . $ex->getMessage());
    }
}

// Update RSVP for event -- Maybe Attending
if (isset($_POST['Maybe']))
{
    $eventID = $_GET['event'];
    $username = $_SESSION['login'];

    try {
        $db = openDBConnection();

        $query = "UPDATE Attending SET rsvp = 2 WHERE eventID = ? AND username = ?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $eventID);
        $stmt->bindValue(2, $username);
        $stmt->execute();
    }
    catch (PDOException $ex) {
        error_log("Tobin bad happened! " . $ex->getMessage());
    }
}

// Update RSVP for event -- Not Attending
if (isset($_POST['Not']))
{
    $eventID = $_GET['event'];
    $username = $_SESSION['login'];

    try {
        $db = openDBConnection();

        $query = "UPDATE Attending SET rsvp = 3 WHERE eventID = ? AND username = ?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $eventID);
        $stmt->bindValue(2, $username);
        $stmt->execute();
    }
    catch (PDOException $ex) {
        error_log("Tobin bad happened! " . $ex->getMessage());
    }
}

// Store comment in DB
if (isset($_POST['Post']))
{
    $eventID = $_GET['event'];
    $comment = trim($_REQUEST['comment']);
    $username = $_SESSION['login'];

    var_dump($comment);

    try {
        $db = openDBConnection();

        $query = "INSERT INTO Comments values (?, ?, ?, NOW())";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $eventID);
        $stmt->bindValue(2, $username);
        $stmt->bindValue(3, $comment);
        $stmt->execute();
    }
    catch (PDOException $ex) {
        error_log("Tobin bad happened! " . $ex->getMessage());
    }
}

class ViewEvent
{
    public $author_Name;
    public $author_Username;
    public $author_Organization;
    public $event_Name;
    public $event_Date;
    public $event_Description;
    public $event_Location;
    public $invited_event = array();
    public $attending_event = array();
    public $maybe_attending_event = array();
    public $not_attending_event = array();
    public $event_comments = array();

    public function __construct($id, $eid)
    {
        $this->view_event($id, $eid);
    }

    // Method for creating a new event
    function view_event($id, $eid)
    {
        try {
            $db = openDBConnection();

            // See if the user has permission to view the event
            $query = "SELECT * FROM EventPermission WHERE eventID = ? and orgID IN (SELECT orgID FROM User WHERE username = ?)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $eid);
            $stmt->bindValue(2, $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $eventID = htmlspecialchars($row['eventID']);
            }

            if (empty($eventID))
            {
                var_dump("Doesn't have permission!!!!!");
                var_dump($eventID);
                return;
            }
            else {

                // Get all information required to display the event
                $query = "SELECT * FROM Event WHERE eventID = ?";
                $stmt = $db->prepare($query);
                $stmt->bindValue(1, $eid);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $this->author_Username = htmlspecialchars($row['creator']);
                    $this->event_Name = htmlspecialchars($row['name']);
                    $this->event_Date = htmlspecialchars($row['date']);
                    $this->event_Description = htmlspecialchars($row['description']);
                    $this->event_Location = htmlspecialchars($row['location']);
                }

                $query = "SELECT User.name, Organizations.name AS orgName From User, Organizations WHERE User.orgID = Organizations.orgID AND username = ?;";
                $stmt = $db->prepare($query);
                $stmt->bindValue(1, $this->author_Username);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $this->author_Name = htmlspecialchars($row['name']);
                    $this->author_Organization = htmlspecialchars($row['orgName']);
                }
            }

            // Get users that are inivted to event
            $query = "SELECT name FROM User, (SELECT username FROM Attending WHERE eventID = ? AND rsvp = 0) as temp WHERE User.username = temp.username";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $eventID);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                array_push($this->invited_event, htmlspecialchars($row['name']));
            }

            // Get users that are attending the event
            $query = "SELECT name FROM User, (SELECT username FROM Attending WHERE eventID = ? AND rsvp = 1) as temp WHERE User.username = temp.username";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $eventID);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                array_push($this->attending_event, htmlspecialchars($row['name']));
            }

            // Get users that are maybe attending the event
            $query = "SELECT name FROM User, (SELECT username FROM Attending WHERE eventID = ? AND rsvp = 2) as temp WHERE User.username = temp.username";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $eventID);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                array_push($this->maybe_attending_event, htmlspecialchars($row['name']));
            }

            // Get users that are not attending the event
            $query = "SELECT name FROM User, (SELECT username FROM Attending WHERE eventID = ? AND rsvp = 3) as temp WHERE User.username = temp.username";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $eventID);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                array_push($this->not_attending_event, htmlspecialchars($row['name']));
            }

            // Get the event comments
            $query = "SELECT name, comment, time FROM Comments, User where Comments.username = User.username AND eventID = ? ORDER BY time ASC";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $eventID);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $commenter_name = htmlspecialchars($row['name']);
                $comment = htmlspecialchars($row['comment']);
                $time = htmlspecialchars($row['time']);
                $this->event_comments[] = array($commenter_name, $comment, $time);
            }

        } catch (PDOException $ex) {
            error_log("Tobin bad happened! " . $ex->getMessage());
        }

        return;
    }
}