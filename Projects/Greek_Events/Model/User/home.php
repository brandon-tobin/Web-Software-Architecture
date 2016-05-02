<?php

/**
 * Created by PhpStorm.
 * User: Fumiko
 * Date: 5/1/2016
 * Time: 5:49 PM
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';
getUserInfo();

if(verify_Login("user"))
{
    require_once ("../../View/User/home_view.php");
}
else
{
    require_once ("../../View/Home/index.php");
}

class home
{
    public $events = array();

//    public $author_Name;
//    public $author_Username;
//    public $author_Organization;
//    public $event_Name;
//    public $event_Date;
//    public $event_Description;
//    public $event_Location;

    public function __construct($id)
    {
        $this->view_all($id);
    }

    // Method for viewing all events a user has access to
    function view_all($id)
    {
        try {
            $db = openDBConnection();

            // Get all the eventID's the user is allowed to view
            $query = "SELECT * FROM EventPermission WHERE orgID IN (SELECT orgID FROM User WHERE username = ?)";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $available_events = array();

            foreach ($result as $row) {
                array_push($available_events, htmlspecialchars($row['eventID']));
            }

            // Get all information required to display all the events the user can attend
            for ($i = 0; $i < count($available_events); $i++)
            {
                $query = "SELECT * FROM Event WHERE eventID = ?";
                $stmt = $db->prepare($query);
                $stmt->bindValue(1,$available_events[$i]);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $author_Username = htmlspecialchars($row['creator']);
                    $event_Name = htmlspecialchars($row['name']);
                    $event_Date = htmlspecialchars($row['date']);
                    $event_Description = htmlspecialchars($row['description']);
                    $event_Location = htmlspecialchars($row['location']);
                }

                $query = "SELECT User.name, Organizations.name AS orgName From User, Organizations WHERE User.orgID = Organizations.orgID AND username = ?;";
                $stmt = $db->prepare($query);
                $stmt->bindValue(1, $author_Username);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $author_Name = htmlspecialchars($row['name']);
                    $author_Organization = htmlspecialchars($row['orgName']);
                }

                //$this->events[] = array($author_Name, $author_Username, $author_Organization, $event_Name, $event_Date, $event_Description, $event_Location, "<a href=\"view_event.php?id=$author_Username&event=".htmlspecialchars($available_events[$i])."\">View</a>");
                $this->events[] = array($author_Name, $author_Username, $author_Organization, $event_Name, $event_Date, $event_Description, $event_Location, "view_event.php?id=$author_Username&event=".htmlspecialchars($available_events[$i])."");

            }



        } catch (PDOException $ex) {
            error_log("Tobin bad happened! " . $ex->getMessage());
        }

        return;
    }
}