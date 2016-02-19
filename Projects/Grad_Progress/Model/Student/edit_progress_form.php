<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Progress Forms Model -- Represents a form object populated with student information
 *
 */

if (isset($_POST['submit']))
{
    $student_ID = $_GET['id'];
    $form_ID = $_GET['form'];
    $updated_date1 = trim($_REQUEST['updated_date1']);
    $updated_date2 = trim($_REQUEST['updated_date2']);
    $updated_date3 = trim($_REQUEST['updated_date3']);
    $updated_date4 = trim($_REQUEST['updated_date4']);
    $updated_date5 = trim($_REQUEST['updated_date5']);
    $updated_date6 = trim($_REQUEST['updated_date6']);
    $updated_date7 = trim($_REQUEST['updated_date7']);
    $updated_date8 = trim($_REQUEST['updated_date8']);
    $updated_date9 = trim($_REQUEST['updated_date9']);
    $requirements_met = trim($_REQUEST['requirements_met']);
    $comments = trim($_REQUEST['comments']);


    // Create a DB connection
    $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V4;charset=utf8", 'Grad_Application', '173620901');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Get original form date
    $query = "SELECT date, student_signed, student_signed_date, advisor_signed, advisor_signed_date FROM Forms WHERE uid = $student_ID AND fid = $form_ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $form_Date = $row['date'];
        $student_signed = $row['student_signed'];
        $student_signed_date = $row['student_signed_date'];
        $advisor_signed = $row['advisor_signed'];
        $advisor_signed_date = $row['advisor_signed_date'];
    }

    // Set the timezone
    date_default_timezone_set('America/Denver');

    // Insert into the forms table
    $db->beginTransaction();
    $stmt = $db->prepare("INSERT INTO Forms (fid, uid, date, meets_requirements, progress_description, modified_date, student_signed, student_signed_date, advisor_signed, advisor_signed_date)
                          VALUES ($form_ID, $student_ID, '". $form_Date."', $requirements_met, ?, CURDATE(), $student_signed, '". $student_signed_date ."', $advisor_signed, '". $advisor_signed_date ."')");
    $stmt->bindValue(1, $comments);
    $stmt->execute();
    $db->commit();

    // Insert into the activities table
    error_log("TOBIN updated_date1 contains : " .$updated_date1);
    if ($updated_date1 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 1, \"$updated_date1\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date2 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 2, \"$updated_date2\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date3 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 3, \"$updated_date3\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date4 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 4, \"$updated_date4\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date5 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 5, \"$updated_date5\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date6 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 6, \"$updated_date6\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date7 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 7, \"$updated_date7\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date8 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 8, \"$updated_date8\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
    if ($updated_date9 != '')
    {
        $db->beginTransaction();
        $stmt = $db->prepare("INSERT INTO Activities (sid, activity, date_completed, date_modified)
                              VALUES ($student_ID, 9, \"$updated_date9\", CURDATE())");
        $stmt->execute();
        $db->commit();
    }
}

class Student_Form
{
    public $date_completed;
    public $student_Name;
    public $student_ID;
    public $degree;
    public $track;
    public $semester_Admitted;
    public $num_semesters;
    public $advisor;
    public $committee;
    public $question1;
    public $question2;
    public $completedActivity;
    public $uncompletedActivity;
    public $activity1;
    public $completed_activity1;
    public $number_semesters1;
    public $acceptable1;
    public $activity2;
    public $completed_activity2;
    public $number_semesters2;
    public $acceptable2;
    public $activity3;
    public $completed_activity3;
    public $number_semesters3;
    public $acceptable3;
    public $activity4;
    public $completed_activity4;
    public $number_semesters4;
    public $acceptable4;
    public $activity5;
    public $completed_activity5;
    public $number_semesters5;
    public $acceptable5;
    public $activity6;
    public $completed_activity6;
    public $number_semesters6;
    public $acceptable6;
    public $activity7;
    public $completed_activity7;
    public $number_semesters7;
    public $acceptable7;
    public $activity8;
    public $completed_activity8;
    public $number_semesters8;
    public $acceptable8;
    public $activity9;
    public $completed_activity9;
    public $number_semesters9;
    public $acceptable9;

    // Constructor
    public function __construct($id, $fid)
    {
        $this->create_Student_Form($id, $fid);
    }

    // Method for creating student form
    function create_Student_Form($id, $fid)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V4;charset=utf8", 'Grad_Application', '173620901');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Query the database to find out which advisor is related to this student.
            $query = "SELECT name FROM Users WHERE uid IN (SELECT aid FROM Advisors WHERE sid = $id)";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->advisor = $row['name'];
            }

            // Query the database to find out which committee memebers are related to this student
            $query = "SELECT name FROM Users WHERE uid IN (SELECT facultyid FROM Committee WHERE sid = $id)";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->committee = array();
            foreach ($result as $row) {
                array_push($this->committee, $row['name']);
            }

            // Get all of the information required to display the student's progress form.
            $query = "SELECT Forms.date, Forms.uid, Forms.meets_requirements, Forms.progress_description, Forms.student_signed, Forms.student_signed_date, Forms.advisor_signed, Forms.advisor_signed_date, Students.degree, Students.track, Students.semester_admitted, Users.name FROM Forms INNER JOIN Students ON Forms.uid = Students.uid INNER JOIN Users ON Forms.uid = Users.uid AND Forms.uid = $id AND Forms.fid = $fid";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->date_completed = $row['date'];
                $this->student_Name = $row['name'];
                $this->student_ID = $row['uid'];
                $this->degree = $row['degree'];
                $this->track = $row['track'];
                $this->semester_Admitted = $row['semester_admitted'];
                $this->question1 = $row['meets_requirements'];
                $this->question2 = $row['progress_description'];
            }

            /*if ($this->question1 == 1)
                $this->question1 = "Yes";
            else
                $this->question1 = "No";
            */
            // Calculate how many semesters in the program
            $admit_Date = "";
            if (strpos($this->semester_Admitted, 'Fall') !== false) {
                $year = substr($this->semester_Admitted, 4, 5);
                $admit_Date = strtotime("1 June $year");
                $current_Date = strtotime("today");
                $elapsed_time = floor((floor(($current_Date - $admit_Date) / 2628000) / 6)) + 1;
                $this->num_semesters = $elapsed_time;
            } else {
                $year = substr($this->semester_Admitted, 6, 9);
                $admit_Date = strtotime("1 January $year");
                $current_Date = strtotime("today");
                $elapsed_time = floor((floor(($current_Date - $admit_Date) / 2628000) / 6)) + 1;
                $this->num_semesters = $elapsed_time;
            }


            $this->uncompletedActivity = array("Identify Advisor", "Program of study approved by advisor and initial committee", "Complete teaching mentorship", "Complete required courses", "Full committee formed", "Program of Study approved by committee", "Written qualifier", "Oral qualifier/Proposal", "Dissertation defense");

            $this->completedActivity = array();

            $query = "SELECT activity, date_completed FROM Activities WHERE sid = $id";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            date_default_timezone_set('America/Denver');
            $admit_Date = strtotime($this->semester_Admitted);
            error_log("TOBIN!!!! Admit_DATE IS " .$admit_Date);
            $current_Date = strtotime("today");
            $elapsed_time = floor((floor(($current_Date - $admit_Date) / 2628000) / 6)) + 1;
            $this->num_semesters = $elapsed_time;

            foreach ($result as $row)
            {
                if ($row['activity'] == 1)
                {
                    $this->activity1 = $row['activity'];
                    $this->completed_activity1 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters1 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters1 = $elapsed_time;
                    }

                    if ($this->number_semesters1 <= 1)
                        $this->acceptable1 = 'Good Progress';
                    else
                        $this->acceptable1 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 2)
                {
                    $this->activity2 = $row['activity'];
                    $this->completed_activity2 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters2 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters2 = $elapsed_time;
                    }

                    if ($this->number_semesters2 <= 4)
                        $this->acceptable2 = 'Good Progress';
                    else
                        $this->acceptable2 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 3)
                {
                    $this->activity3 = $row['activity'];
                    $this->completed_activity3 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters3 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters3 = $elapsed_time;
                    }

                    if ($this->number_semesters3 <= 4)
                        $this->acceptable3 = 'Good Progress';
                    else
                        $this->acceptable3 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 4)
                {
                    $this->activity4 = $row['activity'];
                    $this->completed_activity4 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters4 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters4 = $elapsed_time;
                    }

                    if ($this->number_semesters4 <= 5)
                        $this->acceptable4 = 'Good Progress';
                    else
                        $this->acceptable4 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 5)
                {
                    $this->activity5 = $row['activity'];
                    $this->completed_activity5 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters5 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters5 = $elapsed_time;
                    }

                    if ($this->number_semesters5 <= 6)
                        $this->acceptable5 = 'Good Progress';
                    else
                        $this->acceptable5 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 6)
                {
                    $this->activity6 = $row['activity'];
                    $this->completed_activity6 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters6 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters6 = $elapsed_time;
                    }

                    if ($this->number_semesters6 <= 6)
                        $this->acceptable6 = 'Good Progress';
                    else
                        $this->acceptable6 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 7)
                {
                    $this->activity7 = $row['activity'];
                    $this->completed_activity7 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters7 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters7 = $elapsed_time;
                    }

                    if ($this->number_semesters7 <= 5)
                        $this->acceptable7 = 'Good Progress';
                    else
                        $this->acceptable7 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 8)
                {
                    $this->activity8 = $row['activity'];
                    $this->completed_activity8 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters8 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters8 = $elapsed_time;
                    }

                    if ($this->number_semesters8 <= 7)
                        $this->acceptable8 = 'Good Progress';
                    else
                        $this->acceptable8 = 'Acceptable Progress';
                }
                else if ($row['activity'] == 9)
                {
                    $this->activity9 = $row['activity'];
                    $this->completed_activity9 = $row['date_completed'];
                    if (strpos($row['date_completed'], 'Fall') !== false) {
                        $year = substr($row['date_completed'], 4, 5);
                        $completion_date = strtotime("1 June $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters9 = $elapsed_time;
                    } else {
                        $year = substr($row['date_completed'], 6, 9);
                        $completion_date = strtotime("1 January $year");
                        $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                        $this->number_semesters9 = $elapsed_time;
                    }

                    if ($this->number_semesters9 <= 10)
                        $this->acceptable9 = 'Good Progress';
                    else
                        $this->acceptable9 = 'Acceptable Progress';
                }
            }
        }
        catch (PDOException $ex) {
        }
    }
}
