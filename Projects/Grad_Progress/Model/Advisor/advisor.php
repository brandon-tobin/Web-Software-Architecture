<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Advisor Model -- Represents an advisor object who has a list of students
 *
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

verify_Login('faculty');

class Advisor
{
    public $advisor_First_Name;
    public $advisor_ID;
    public $student_Array;

    // Constructor
    public function __construct($id)
    {
        $this->create_Advisor($id);
    }

    // Method for creating an advisor
    function create_Advisor($id)
    {
        $this->advisor_ID = $id;
        try {
            $db = openDBConnection();

            // Query the database to get the name of the advisor
            $query = "SELECT name FROM Users WHERE uid = $id";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->advisor_First_Name = $row['name'];
            }

            // Query the database to get information about the students that are linked to the advisor and format it to be displayed in the view
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

                date_default_timezone_set('America/Denver');
                if (strtotime($row['date']) > strtotime('-6 month'))
                    $isCurrent = "Current";

                $this->student_Array[] = array($row['name'], $requirementsMet, $row['date'], $isCurrent, $isSigned, "<a href=\"../Student/student_forms.php?id=" . $row['uid'] . "\">View</a>");

            }
        }
        catch (PDOException $ex) {
        }

    }
}