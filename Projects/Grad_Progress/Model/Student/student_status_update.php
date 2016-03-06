<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Model for updating a student status
 *
 */

require '../../Model/Functions/db.php';
require '../../Model/Functions/authentication.php';

verify_Login('student');

if (isset($_REQUEST['submit']))
{
    $update = trim($_REQUEST['update']);

    $db = openDBConnection();

    $query = "SELECT count(*) as count FROM Forms WHERE uid = ?";
    $stmt = $db->prepare($query);
    $stmt->bindValue(1, $_SESSION['userid']);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row)
    {
        $fid = $row['count'];
    }

    $query = "UPDATE Forms SET meets_requirements = ?, advisor_signed = ? WHERE uid = ? AND fid = ?";
    $stmt = $db->prepare($query);
    $stmt->bindValue(1, $update);
    $stmt->bindValue(2, 0);
    $stmt->bindValue(3, $_SESSION['userid']);
    $stmt->bindValue(4, $fid);
    $stmt->execute();
    $db->commit();
}


class New_Student_Status_Update
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
        }
        catch (PDOException $ex)
        {
        }
    }
}

