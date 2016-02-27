<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms Model -- Represents a list of forms for student
 *
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

verify_Login('student');

class New_Student_Status
{
    public $student_status;


    // Constructor
    public function __construct($id)
    {
        $this->get_status($id);
    }

    // Method for creating a student
    function get_status($id)
    {
        try {
            $db = openDBConnection();

            // Query the database to get the name of the student
            $query = "SELECT meets_requirements FROM Forms WHERE uid = $id AND fid = (SELECT count(*) FROM Forms WHERE uid = $id)";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->student_status = $row['meets_requirements'];
            }
        }
        catch (PDOException $ex)
        {
        }
    }
}

