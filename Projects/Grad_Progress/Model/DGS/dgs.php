<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * DGS Model -- Represents a view for displaying all advisors and students
 *
 */

require '../../Model/Functions/db.php';

require '../../Model/Functions/authentication.php';

verify_Login('dgs');

class DGS
{
    public $advisors;
    public $students_arr;

    // Constructor
    public function __construct()
    {
        $this->create_DGS();
    }

    // Method for creating a DGS view
    function create_DGS()
    {
        try {
            $db = openDBConnection();

            // Query the database for all advisors and format it to be shown in the view.
            $query = "SELECT Advisors.aid, Users.name FROM Advisors INNER JOIN Users ON Advisors.aid = Users.uid GROUP BY aid";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->advisors = array();
            foreach ($result as $row) {
                $this->advisors[] = array($row['name'], "<a href=\"../Advisor/students.php?id=".$row['aid']."\">View</a>");
            }

            // Query the database for all students and format it to be shown in the view.
            $query = "SELECT Students.uid, Users.name FROM Students INNER JOIN Users ON Students.uid = Users.uid GROUP BY uid";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->students_arr = array();
            foreach ($result as $row) {
                $this->students_arr[] = array($row['name'], "<a href=\"../Student/student_forms.php?id=".$row['uid']."\">View</a>");
            }
        }
        catch (PDOException $ex) {
        }

    }
}