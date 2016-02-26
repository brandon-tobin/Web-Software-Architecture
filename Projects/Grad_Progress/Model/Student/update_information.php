<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Model to allow the DGS to change the role of a user.
 *
 */

require '../../Model/Functions/db.php';

require '../../Model/Functions/authentication.php';

verify_Login('student');

if (isset($_POST['submit']))
{
    //$name = trim($_REQUEST['name']);
    $degree = trim($_REQUEST['degree']);
    $track = trim($_REQUEST['track']);
    $semester_admitted = trim($_REQUEST['semester_admitted']);

    // Create a DB connection
    $db = openDBConnection();
    $db->beginTransaction();

    // Update the roll
    $stmt = $db->prepare("INSERT INTO Students (degree, track, semester_admitted) VALUES (?, ?, ?)");
    $stmt->bindValue(1, $degree);
    $stmt->bindValue(2, $track);
    $stmt->bindValue(3, $semester_admitted);
    $stmt->execute();

    $db->commit();
}

if (isset($_POST['Submit']))
{
    $uid = trim($_REQUEST['uid']);
    $name = trim($_REQUEST['name']);
    $degree = trim($_REQUEST['degree']);
    $track = trim($_REQUEST['track']);
    $semester_admitted = trim($_REQUEST['semester_admitted']);

    // Create a DB connection
    $db = openDBConnection();
    $db->beginTransaction();

    // Update the roll
    $stmt = $db->prepare("UPDATE Students SET degree = ?, track = ?, semester_admitted = ? WHERE uid = ?; ");
    $stmt->bindValue(1, $degree);
    $stmt->bindValue(2, $track);
    $stmt->bindValue(3, $semester_admitted);
    $stmt->bindValue(4, $uid);
    $stmt->execute();

    $stmt = $db->prepare("UPDATE Users SET name = ? WHERE uid = ?; ");
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $_SESSION['userid']);
    $stmt->execute();

    $db->commit();
}

class Update_Info
{
    public $uid;
    public $name;
    public $position;
    public $username;
    public $degree;
    public $track;
    public $semester_admitted;
    public $first_submission;


    // Constructor
    public function __construct()
    {
        $this->user_info();
    }

    // Method for creating student form
    function user_info()
    {
        try {
            $this->uid = $_SESSION['userid'];
            $this->name = $_SESSION['realname'];
            $this->username = $_SESSION['login'];

            $db = openDBConnection();

            // Query the database to find out which advisor is related to this student.
            $query = "SELECT Students.degree, Students.track, Students.semester_admitted FROM Users INNER JOIN Students ON Users.uid = Students.uid AND Users.uid = ?;";
            $statement = $db->prepare($query);
            $statement->bindValue(1, $this->uid);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            error_log("TOBIN RESULT IS : " . var_dump($result));

            foreach ($result as $row) {
                $this->degree = $row['degree'];
                $this->track = $row['track'];
                $this->semester_admitted = $row['semester_admitted'];
            }

            $query = "SELECT role FROM Roles WHERE username = ?";
            $statement = $db->prepare($query);
            $statement->bindValue(1, $this->username);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row)
            {
                $this->position = $row['role'];
            }

            if ($this->degree == '' && $this->track == '' && $this->semester_admitted == '')
                $this->first_submission = true;
        }
        catch (PDOException $ex) {
            error_log("TOBIN ACCESS FAILED MESSAGE IS: " . $ex->getMessage());
        }
    }
}
