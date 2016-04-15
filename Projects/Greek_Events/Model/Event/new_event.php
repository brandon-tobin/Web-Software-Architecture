<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 4/14/2016
 * Time: 9:06 PM
 */

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
            $query = "SELECT username, User.name, Organizations.name as orgName FROM User INNER JOIN Organizations ON User.orgID = Organizations.orgID";
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