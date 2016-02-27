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
    public $advisor_approval;


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
            $query = "SELECT meets_requirements, advisor_signed FROM Forms WHERE uid = $id AND fid = (SELECT count(*) FROM Forms WHERE uid = $id)";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->student_status = $row['meets_requirements'];
            }

            if ($this->student_status == 1)
            {
                $this->student_status = "On track and meets requirements.";
            }
            else
            {
                $this->student_status = "Not on track and does not meet requirements";
            }

            if ($this->advisor_approval == 1)
            {
                $this->advisor_approval = "Status has been approved by your advisor.";
            }
            else
            {
                $this->advisor_approval = "Status has not yet been approved by your advisor";
            }

        }
        catch (PDOException $ex)
        {
        }
    }
}

