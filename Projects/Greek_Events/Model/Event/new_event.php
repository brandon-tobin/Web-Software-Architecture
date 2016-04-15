<?php

/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * New Event Model -- Represents a new event object
 *
 */

//require '../../Model/Functions/db.php';

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
            //$db = openDBConnection();
            $db = new PDO ("mysql:host=localhost;dbname=Greek_System;charset=utf8", 'Grad_Application', '173620901');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


            // Get all information required to display the new event creation page
            $query = "SELECT username, User.name, Organizations.name as orgName FROM User INNER JOIN Organizations ON User.orgID = Organizations.orgID where username = $id";
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