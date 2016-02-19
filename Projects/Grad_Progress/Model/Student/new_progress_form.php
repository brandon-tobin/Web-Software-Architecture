<?php

if (isset($_POST['submit']))
{
    $student_ID = $_GET['id'];
    $advisor = trim($_REQUEST['advisor']);
    $committee1 = trim($_REQUEST['committee1']);
    $committee2 = trim($_REQUEST['committee2']);
    $committee3 = trim($_REQUEST['committee3']);
    $committee4 = trim($_REQUEST['committee4']);
    $activity1 = trim($_REQUEST['activity1']);
    $semester_completed1 = trim($_REQUEST['semester_completed1']);
    $activity2 = trim($_REQUEST['activity2']);
    $semester_completed2 = trim($_REQUEST['semester_completed2']);
    $activity3 = trim($_REQUEST['activity3']);
    $semester_completed3 = trim($_REQUEST['semester_completed3']);
    $activity4 = trim($_REQUEST['activity4']);
    $semester_completed4 = trim($_REQUEST['semester_completed4']);
    $activity5 = trim($_REQUEST['activity5']);
    $semester_completed5 = trim($_REQUEST['semester_completed5']);
    $activity6 = trim($_REQUEST['activity6']);
    $semester_completed6 = trim($_REQUEST['semester_completed6']);
    $activity7 = trim($_REQUEST['activity7']);
    $semester_completed7 = trim($_REQUEST['semester_completed7']);
    $activity8 = trim($_REQUEST['activity8']);
    $semester_completed8 = trim($_REQUEST['semester_completed8']);
    $activity9 = trim($_REQUEST['activity9']);
    $semester_completed9 = trim($_REQUEST['semester_completed9']);
    $requirements_met = trim($_REQUEST['requirements_met']);
    $comments = trim($_REQUEST['comments']);

    // Get highest form number for user
    $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V4;charset=utf8", 'Grad_Application', '173620901');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Get all of the information required to display the student's progress form.
    $query = "SELECT COUNT(fid) as fid FROM Forms WHERE uid = $student_ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $form_ID = $row['fid'] + 1;
    }

    date_default_timezone_set('America/Denver');
    $timestamp = time();
    $date_complete = date("Y-mm-dd", $timestamp);

    // Insert into the forms table
    $db->beginTransaction();
    $stmt = $db->prepare("INSERT INTO Forms (fid, uid, date, meets_requirements, progress_description, modified_date) VALUES ($form_ID, $student_ID, CURDATE(),
              $requirements_met, ?, CURDATE())");
    $stmt->bindValue(1, $comments);
    $stmt->execute();
    $db->commit();

    // Insert into the activities table
    if ($activity1 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 1, \"$semester_completed1\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($activity2 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 2, \"$semester_completed2\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($activity3 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 3, \"$semester_completed3\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($activity4 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 4, \"$semester_completed4\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($activity5 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 5, \"$semester_completed5\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($activity6 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 6, \"$semester_completed6\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($activity7 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 7, \"$semester_completed7\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($activity9 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 9, \"$semester_completed9\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }











   /* if ($activity9 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\"),
                              ($student_ID, \"Complete teaching mentorship\", \"$semester_completed3\"),
                              ($student_ID, \"Complete required courses\", \"$semester_completed4\"),
                              ($student_ID, \"Full committee formed\", \"$semester_completed5\"),
                              ($student_ID, \"Program of Study approved by committee\", \"$semester_completed6\"),
                              ($student_ID, \"Written qualifier\", \"$semester_completed7\"),
                              ($student_ID, \"Oral qualifier/Proposal\", \"$semester_completed8\"),
                              ($student_ID, \"Dissertation defense\", \"$semester_completed9\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity8 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\"),
                              ($student_ID, \"Complete teaching mentorship\", \"$semester_completed3\"),
                              ($student_ID, \"Complete required courses\", \"$semester_completed4\"),
                              ($student_ID, \"Full committee formed\", \"$semester_completed5\"),
                              ($student_ID, \"Program of Study approved by committee\", \"$semester_completed6\"),
                              ($student_ID, \"Written qualifier\", \"$semester_completed7\"),
                              ($student_ID, \"Oral qualifier/Proposal\", \"$semester_completed8\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity7 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\"),
                              ($student_ID, \"Complete teaching mentorship\", \"$semester_completed3\"),
                              ($student_ID, \"Complete required courses\", \"$semester_completed4\"),
                              ($student_ID, \"Full committee formed\", \"$semester_completed5\"),
                              ($student_ID, \"Program of Study approved by committee\", \"$semester_completed6\"),
                              ($student_ID, \"Written qualifier\", \"$semester_completed7\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity6 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\"),
                              ($student_ID, \"Complete teaching mentorship\", \"$semester_completed3\"),
                              ($student_ID, \"Complete required courses\", \"$semester_completed4\"),
                              ($student_ID, \"Full committee formed\", \"$semester_completed5\"),
                              ($student_ID, \"Program of Study approved by committee\", \"$semester_completed6\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity5 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\"),
                              ($student_ID, \"Complete teaching mentorship\", \"$semester_completed3\"),
                              ($student_ID, \"Complete required courses\", \"$semester_completed4\"),
                              ($student_ID, \"Full committee formed\", \"$semester_completed5\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity4 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\"),
                              ($student_ID, \"Complete teaching mentorship\", \"$semester_completed3\"),
                              ($student_ID, \"Complete required courses\", \"$semester_completed4\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity3 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\"),
                              ($student_ID, \"Complete teaching mentorship\", \"$semester_completed3\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity2 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\"),
                              ($student_ID, \"Program of study approved by advisor and initial committee\", \"$semester_completed2\")");
        $stmt->execute();
        $db->commit();
    }
    else if ($activity1 != 0)
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed) VALUES
                              ($student_ID, \"Identify Advisor\", \"$semester_completed1\")");
        $stmt->execute();
        $db->commit();
    }*/

    require("../../View/UserCreation/creation_success_view.php");
}

class New_Student_Form
{
    public $student_Name;
    public $student_ID;
    public $degree;
    public $track;
    public $semester_Admitted;
    public $date_completed;
    public $advisor_array;
    public $committee_array;

    // Constructor
    public function __construct($id)
    {
        $this->create_Student_Form($id);
    }

    // Method for creating student form
    function create_Student_Form($id)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V4;charset=utf8", 'Grad_Application', '173620901');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Get all of the information required to display the student's progress form.
            $query = "SELECT Users.uid, Users.name, Students.degree, Students.track, Students.semester_admitted
                        FROM Users INNER JOIN Students ON Users.uid = Students.uid WHERE Users.uid = $id";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->student_Name = $row['name'];
                $this->student_ID = $row['uid'];
                $this->degree = $row['degree'];
                $this->track = $row['track'];
                $this->semester_Admitted = $row['semester_admitted'];
            }

            date_default_timezone_set('America/Denver');
            $timestamp = time();
            $this->date_completed = date("Y-m-d", $timestamp);

            $query = "SELECT name FROM Users WHERE position = 'F'";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->advisor_array = array();
            $this->committee_array = array();
            foreach ($result as $row) {
                array_push($this->advisor_array, $row['name']);
                array_push($this->committee_array, $row['name']);
            }

        } catch (PDOException $ex) {
            error_log("Tobin bad happened! " . $ex->getMessage());
        }

       // require "../../View/Student/new_progress_form_view.php";

        return;
    }
}




