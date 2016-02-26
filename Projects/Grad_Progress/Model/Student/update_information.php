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
    $degree = trim($_REQUEST['degree']);
    $track = trim($_REQUEST['track']);
    $semester_admitted = trim($_REQUEST['semester_admitted']);
    $advisor = trim($_REQUEST['advisor']);

    // Create a DB connection
    $db = openDBConnection();
    $db->beginTransaction();

    // Update the roll
    $stmt = $db->prepare("INSERT INTO Students (uid, degree, track, semester_admitted) VALUES (?, ?, ?, ?)");
    $stmt->bindValue(1, $_SESSION['userid']);
    $stmt->bindValue(2, $degree);
    $stmt->bindValue(3, $track);
    $stmt->bindValue(4, $semester_admitted);
    $stmt->execute();

    //if ($_REQUEST['new_advisor_checked'])
    //{
        $stmt = $db->prepare("INSERT INTO Advisors (aid, sid) VALUES ((SELECT uid FROM Users WHERE name = ?), ?)");
        $stmt->bindValue(1, $advisor);
        $stmt->bindValue(2, $_SESSION['userid']);
        $stmt->execute();
    //}

    //if ($_REQUEST['new_committee_checked'])
    //{
        $committee1 = trim($_REQUEST['committee1']);
        $committee2 = trim($_REQUEST['committee2']);
        $committee3 = trim($_REQUEST['committee3']);
        $committee4 = trim($_REQUEST['committee4']);

        $stmt = $db->prepare("INSERT INTO Committee (sid, facultyid) VALUES (?, (SELECT uid FROM Users WHERE name = ?)), (?, (SELECT uid FROM Users WHERE name = ?)),
                              (?, (SELECT uid FROM Users WHERE name = ?)), (?, (SELECT uid FROM Users WHERE name = ?))");
        $stmt->bindValue(1, $_SESSION['userid']);
        $stmt->bindValue(2, $committee1);
        $stmt->bindValue(3, $_SESSION['userid']);
        $stmt->bindValue(4, $committee2);
        $stmt->bindValue(5, $_SESSION['userid']);
        $stmt->bindValue(6, $committee3);
        $stmt->bindValue(7, $_SESSION['userid']);
        $stmt->bindValue(8, $committee4);
        $stmt->execute();
    //}

    $db->commit();

    require ('../../View/Account/account_home.php');
}

if (isset($_POST['Submit']))
{
    $degree = trim($_REQUEST['degree']);
    $track = trim($_REQUEST['track']);
    $semester_admitted = trim($_REQUEST['semester_admitted']);
    $advisor = trim($_REQUEST['advisor']);




    // Create a DB connection
    $db = openDBConnection();

    $db->beginTransaction();

    // Update the student
    $stmt = $db->prepare("UPDATE Students SET degree = ?, track = ?, semester_admitted = ? WHERE uid = ?; ");
    $stmt->bindValue(1, $degree);
    $stmt->bindValue(2, $track);
    $stmt->bindValue(3, $semester_admitted);
    $stmt->bindValue(4, $_SESSION['userid']);
    $stmt->execute();
    $db->commit();



    if (isset($_REQUEST['new_advisor_checked']))
    {
        // Get advisor uid
        /*$stmt = $db->prepare("SELECT uid FROM Users WHERE name = ?");
        $stmt->bindValue(1, $advisor);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row)
        {
            $aid = $row['uid'];
        }*/

        // Update the student advisor
        $stmt = $db->prepare("UPDATE Advisors SET aid = (SELECT uid FROM Users WHERE name = ?) WHERE uid = ?");
        $stmt->bindValue(1, $advisor);
        $stmt->bindValue(2, $_SESSION['userid']);
        $db->commit();

    }

    if (isset($_REQUEST['new_committee_checked']))
    {
        $committee1 = trim($_REQUEST['committee1']);
        $committee2 = trim($_REQUEST['committee2']);
        $committee3 = trim($_REQUEST['committee3']);
        $committee4 = trim($_REQUEST['committee4']);

        $db->beginTransaction();
        // Delete the student's committee
        $stmt = $db->prepare("DELETE FROM Committee WHERE uid = ?");
        $stmt->bindValue(1, $_SESSION['userid']);
        $stmt->execute();

        // Update the student committee
        $stmt = $db->prepare("INSERT INTO Committee (sid, facultyid) VALUES ((?, (SELECT uid FROM Users WHERE name = ?)), (?, (SELECT uid FROM Users WHERE name = ?)),
                              (?, (SELECT uid FROM Users WHERE name = ?)), (?, (SELECT uid FROM Users WHERE name = ?)))");
        $stmt->bindValue(1, $_SESSION['userid']);
        $stmt->bindValue(2, $committee1);
        $stmt->bindValue(3, $_SESSION['userid']);
        $stmt->bindValue(4, $committee2);
        $stmt->bindValue(5, $_SESSION['userid']);
        $stmt->bindValue(6, $committee3);
        $stmt->bindValue(7, $_SESSION['userid']);
        $stmt->bindValue(8, $committee4);
        $stmt->execute();
        $db->commit();
    }

    require ('../../View/Account/account_home.php');
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
    public $advisor;
    public $all_advisors;
    public $committee;
    public $all_committee;


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

            $query = "SELECT Users.name FROM Advisors INNER JOIN Users ON Advisors.aid = Users.uid WHERE Advisors.sid = ?;";
            $statement = $db->prepare(($query));
            $statement->bindValue(1, $this->uid);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row)
            {
                $this->advisor = $row['name'];
            }

            $query = "SELECT DISTINCT Users.name FROM Advisors INNER JOIN Users ON Advisors.aid = Users.uid;";
            $statement = $db->prepare(($query));
            $statement->bindValue(1, $this->uid);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->all_advisors = array();
            foreach ($result as $row)
            {
                array_push($this->all_advisors, $row['name']);
            }

            $query = "SELECT name FROM Users WHERE uid IN (SELECT facultyid FROM Committee WHERE sid = ?);";
            $statement = $db->prepare(($query));
            $statement->bindValue(1, $this->uid);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->committee = array();
            foreach ($result as $row)
            {
                array_push($this->committee, $row['name']);
            }

            $query = "SELECT name FROM Users WHERE uid IN (SELECT facultyid FROM Committee);";
            $statement = $db->prepare(($query));
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->all_committee = array();
            foreach ($result as $row) {
                array_push($this->all_committee, $row['name']);
            }

            error_log("COMMITTEE CONSIST OF : " . var_dump($this->all_committee));

            if ($this->degree == '' && $this->track == '' && $this->semester_admitted == '')
                $this->first_submission = true;

            //require ('../../View/Student/update_information_view.php');
        }
        catch (PDOException $ex) {
            error_log("TOBIN ACCESS FAILED MESSAGE IS: " . $ex->getMessage());
        }
    }
}
