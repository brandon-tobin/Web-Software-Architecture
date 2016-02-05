<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms Model -- Represents a list of forms for student
 *
 */

class Student
{
    public $student_First_Name;
    public $form_count;
    public $form_Records_Array;

    // Constructor
    public function __construct($id)
    {
        $this->create_Student($id);
    }

    // Method for creating a student
    function create_Student($id)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V3;charset=utf8", 'root', '173620901');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $query = "SELECT name FROM Users WHERE uid = $id";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->student_First_Name = $row['name'];
            }

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

               $this->form_Records_Array[] = array($row['date'], $row['modified_date'], $requirementsMet, "<a href=\"progress_form.php?id=$id&form=".$row['fid']."\">View</a>" );
            }
        }
        catch (PDOException $ex)
        {
        }
    }
}

