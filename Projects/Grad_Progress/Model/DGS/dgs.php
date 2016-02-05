<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * DGS Model -- Represents a view for displaying all advisors and students
 *
 */

require 'db_config.php';

class DGS
{
    public $advisor_First_Name;
    public $advisor_Last_Name;
    public $student_Array;
    public $student_Count;


    public $advisors;
    public $students;

    // Constructor
    public function __construct($id)
    {
        $this->create_DGS($id);
    }

    // Method for creating a DGS view
    function create_DGS($id)
    {
        try {

            $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V3;charset=utf8", 'Grad_Application', '173620901');
            //$db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


            $query = "SELECT Advisors.aid, Users.name FROM Advisors INNER JOIN Users ON Advisors.aid = Users.uid GROUP BY aid";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->advisors = array();
            foreach ($result as $row) {
                $this->advisors[] = array($row['name'], "<a href=\"students.php?id=".$row['aid'].">View</a>");
            }

            $query = "SELECT Students.uid, Users.name FROM Students INNER JOIN Users ON Students.uid = Users.uid GROUP BY uid";
            $statement = $db->prepare($query);
            $statement->execute();

            $this->students = array();
            foreach ($result as $row) {
                $this->students[] = array($row['name'], "<a href=\"../Student/student_forms.php?id=".$row['uid'].">View</a>");
            }




/*
            $query = "SELECT name FROM Users WHERE uid = $id";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->advisor_First_Name = $row['name'];
            }

            $query = "SELECT meets_requirements, advisor_signed, Users.name, Users.uid, max(date) as date FROM Forms INNER JOIN Advisors ON Forms.uid = Advisors.sid INNER JOIN Users ON Advisors.sid = Users.uid AND aid = $id GROUP BY name";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->student_Array = array();
            foreach ($result as $row) {
                $isSigned = "No";
                $requirementsMet = "No";
                $isCurrent = "Not Current";
                if ($row['advisor_signed'] == 1)
                    $isSigned = "Yes";
                if ($row['meets_requirements'] == 1)
                    $requirementsMet = "Yes";

                if (strtotime($row['date']) > strtotime('-6 month'))
                    $isCurrent = "Current";

                $this->student_Array[] = array($row['name'], $requirementsMet, $row['date'], $isCurrent, $isSigned, "<a href=\"../Student/student_forms.php?id=" . $row['uid'] . "\">View</a>");

            }*/
        }
        catch (PDOException $ex) {
        }

    }
}