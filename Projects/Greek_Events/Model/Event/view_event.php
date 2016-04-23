<?php

/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * View Event Model -- Retrieves the Event From the Database
 *
 */

require '../../Model/Functions/db.php';

class ViewEvent
{
    public $author_Name;
    public $author_Username;
    public $author_Organization;
    public $event_Name;
    public $event_Date;
    public $event_Description;
    public $event_Location;

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
            $query = "SELECT * FROM EventPermission WHERE eventID = ? and orgID IN (SELECT orgID FROM User WHERE username =  '" .$id ."')";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $eid);
            $stmt->bindValue(2, $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $eventID = "";
            foreach ($result as $row) {
                $eventID = htmlspecialchars($row['eventID']);
            }

            //if (strcmp($eventID, "NULL") !== 0)
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
                    //$this->author_Name = htmlspecialchars($row['creator']);
                    $this->author_Username = htmlspecialchars($row['creator']);
                    //$this->author_Organization = htmlspecialchars($row['orgName']);
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

        } catch (PDOException $ex) {
            error_log("Tobin bad happened! " . $ex->getMessage());
        }

        return;
    }
}