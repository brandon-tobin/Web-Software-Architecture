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

class Student
{
    public $student_First_Name;
    public $form_count;
    public $form_Records_Array;
    public $creation_form_link;
    public $student_ID;

    // Constructor
    public function __construct($id)
    {
        $this->create_Student($id);
    }

    // Method for creating a student
    function create_Student($id)
    {
        try {
            $db = openDBConnection();

            // Query the database to get the name of the student
            $query = "SELECT name FROM Users WHERE uid = $id";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->student_First_Name = $row['name'];
            }

            // Query the database to get the information required to display the list of student forms
            $query = "SELECT meets_requirements, uid, fid, date, modified_date FROM Forms WHERE uid = $id";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->form_Records_Array = array();
            foreach ($result as $row)
            {
                $requirementsMet = "No";
                if ($row['meets_requirements'] == 1)
                    $requirementsMet = "Yes";

               $this->form_Records_Array[] = array($row['date'], $row['modified_date'], $requirementsMet, "<a href=\"progress_form.php?id=$id&form=".$row['fid']."\">View</a>" , "<a href=\"edit_progress_form.php?id=$id&form=".$row['fid']."\">Edit</a>");
            }

            $this->student_ID = $id;
        }
        catch (PDOException $ex)
        {
        }
    }
}

