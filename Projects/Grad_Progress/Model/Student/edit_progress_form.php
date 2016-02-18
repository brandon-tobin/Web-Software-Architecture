<?php
/**
 * Created by PhpStorm.
 * User: brand
 * Date: 2/18/2016
 * Time: 1:38 PM
 */

class edit_progress_form {
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

            if ($this->question1 == 1)
                $this->question1 = "Yes";
            else
                $this->question1 = "No";

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

            foreach ($result as $row) {
                $key = array_search($row['activity'], $this->uncompletedActivity);
                if ($key !== 0 || $key !== false)
                    unset($this->uncompletedActivity[$key]);

                $activity_semesters = "";
                if (strpos($row['date_completed'], 'Fall') !== false) {
                    $year = substr($row['date_completed'], 4, 5);
                    $completion_date = strtotime("1 June $year");
                    $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                    $activity_semesters = $elapsed_time;
                } else {
                    $year = substr($row['date_completed'], 6, 9);
                    $completion_date = strtotime("1 January $year");
                    $elapsed_time = floor((floor(($completion_date - $admit_Date) / 2628000) / 6)) + 1;
                    $activity_semesters = $elapsed_time;
                }

                // Check to see if the progress was good or acceptable
                $acceptable = "";
                if ((strpos($row['activity'], 'Identify Advisor') !== false) && $activity_semesters == 1) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Program of study approved by advisor and initial committee') !== false) && $activity_semesters == 4) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Complete teaching mentorship') !== false) && $activity_semesters == 4) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Complete required courses') !== false) && $activity_semesters == 5) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Full committee formed') !== false) && $activity_semesters == 6) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Program of Study approved by committee') !== false) && $activity_semesters == 6) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Written qualifier') !== false) && $activity_semesters == 5) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Oral qualifier/Proposal') !== false) && $activity_semesters == 7) {
                    $acceptable = "Good Progress";
                } else if ((strpos($row['activity'], 'Dissertation defense') !== false) && $activity_semesters == 10) {
                    $acceptable = "Good Progress";
                } else {
                    $acceptable = "Acceptable Progress";
                }

                $this->completedActivity[] = array($row['activity'], $activity_semesters, $acceptable, $row['date_completed']);
            }
        } catch (PDOException $ex) {
        }
    }
}