<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Progress Forms Model -- Represents a form object populated with student information
 *
 */

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
    public $activity1;
    public $completed1;
    public $acceptable1;
    public $activity2;
    public $completed2;
    public $acceptable2;
    public $activity3;
    public $completed3;
    public $acceptable3;
    public $activity4;
    public $completed4;
    public $acceptable4;
    public $activity5;
    public $completed5;
    public $acceptable5;
    public $activity6;
    public $completed6;
    public $acceptable6;
    public $activity7;
    public $completed7;
    public $acceptable7;
    public $activity8;
    public $completed8;
    public $acceptable8;
    public $activity9;
    public $completed9;
    public $acceptable9;
    public $question1;
    public $question2;
    public $completedActivity;
    public $uncompletedActivity;

    // Constructor
    public function __construct($id, $fid)
    {
       /* if ($id == 1)
        {
            $this->create_Anne($id, $fid);
        }
        if ($id == 2)
        {
            $this->create_Mike();
        }
        if ($id == 3)
        {
            $this->create_Brad();
        }
        if ($id == 4)
        {
            $this->create_Jessica();
        }
        if ($id == 5)
        {
            $this->create_Neal();
        }
        if ($id == 6)
        {
            $this->create_Sam();
        }*/
        $this->create_Anne($id, $fid);
    }

    // Method for creating student Anne
    function create_Anne($id, $fid)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V3;charset=utf8", 'root', '173620901');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $query = "SELECT name FROM Users WHERE uid IN (SELECT aid FROM Advisors WHERE sid = $id)";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->advisor = $row['name'];
            }

            $query = "SELECT name FROM Users WHERE uid IN (SELECT facultyid FROM Committee WHERE sid = $id)";
            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->committee = array();
            foreach ($result as $row) {
                array_push($this->committee, $row['name']);
            }

            $query = "SELECT Forms.date, Forms.uid, Forms.progress_description, Forms.student_signed, Forms.student_signed_date, Forms.advisor_signed, Forms.advisor_signed_date, Students.degree, Students.track, Students.semester_admitted, Users.name FROM Forms INNER JOIN Students ON Forms.uid = Students.uid INNER JOIN Users ON Forms.uid = Users.uid AND Forms.uid = $id AND Forms.fid = $fid";
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


            }

            // Need to calculate how many semesters the student has been in the program
            $admit_Date = strtotime($this->semester_Admitted);
            $current_Date = strtotime(getdate());
            $time_since_admitted = $current_Date - $admit_Date;
           // $this->num_semesters = $time_since_admitted;
           // $this->num_semesters = $current_Date;
            if (strpos($this->semester_Admitted, 'Fall') !== false)
            {
                $admit_Date = strtotime("1 June 2015");
                $current_Date = strtotime("today");
                $elapsed_time = $current_Date - $admit_Date / 2628000;
                $this->num_semesters = $elapsed_time;
            }
           // $this->num_semesters = strtotime($admit_Date);


            $this->uncompletedActivity = array("Identify Advisor", "Program of study approved by advisor and initial committee", "Complete teaching mentorship", "Complete required courses", "Full committee formed", "Program of Study approved by committee", "Written qualifier", "Oral qualifier/Proposal", "Dissertation defense");

            $this->completedActivity = array();

            $query = "SELECT activity, date_completed FROM Activities WHERE sid = $id";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
               $key = array_search($row['activity'], $this->uncompletedActivity);
                if ($key != 0 || $key != false)
                    unset($this->uncompletedActivity[$key]);

                $this->completedActivity[] = array($row['activity'], $row['date_completed']);
            }
        }
        catch (PDOException $ex) {
        }











      //  $this->date_completed = 'January 18, 2016';
      //  $this->student_Name = 'Anne Smith';
      //  $this->student_ID = 'u0123456';
      //  $this->degree = 'Computer Science';
      //  $this->track = 'Networking';
      //  $this->semester_Admitted = 'Fall 2015';
      //  $this->num_semesters = 1;
      //  $this->advisor = 'Peter James';
      //  $this->committee = array("Peter", "Jim", "Joe", "Mark");
      //  $this->activity1 = '1 Semester';
      //  $this->completed1 = 'Fall 2015';
      //  $this->acceptable1 = 'Good Progress';
     //   $this->question1 = 'YES';
      //  $this->question2 = 'The student is on track and making good progress.';
    }

    // Method for creating student Mike
    function create_Mike()
    {
        $this->date_completed = 'December 8, 2014';
        $this->student_Name = 'Mike Jones';
        $this->student_ID = 'u0234567';
        $this->degree = 'Computer Science';
        $this->track = 'Data';
        $this->semester_Admitted = 'Fall 2013';
        $this->num_semesters = 3;
        $this->advisor = 'James Good';
        $this->committee = array("Peter", "Jim", "Joe", "Mark");
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }

    // Method for creating student Brad
    function create_Brad()
    {
        $this->date_completed = 'October 20, 2014';
        $this->student_Name = 'Brad Rust';
        $this->student_ID = 'u0567899';
        $this->degree = 'Computer Science';
        $this->track = 'Data';
        $this->semester_Admitted = 'Fall 2013';
        $this->num_semesters = 3;
        $this->advisor = 'Peter James';
        $this->committee = array("Peter", "Jim", "Joe", "Mark");
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }

    // Method for creating student Jessica
    function create_Jessica()
    {
        $this->date_completed = 'January 19, 2016';
        $this->student_Name = 'Jessica Brown';
        $this->student_ID = 'u0345678';
        $this->degree = 'Computer Science';
        $this->track = 'Databases';
        $this->semester_Admitted = 'Spring 2011';
        $this->num_semesters = 10;
        $this->advisor = 'Brandon Barnes';
        $this->committee = array("Peter", "Jim", "Joe", "Mark");
        $this->activity1 = '1 Semester';
        $this->completed1 = 'Spring 2011';
        $this->acceptable1 = 'Good Progress';
        $this->activity2 = '4 Semesters';
        $this->completed2 = 'Spring 2013';
        $this->acceptable2 = 'Good Progress';
        $this->activity3 = '4 Semesters';
        $this->completed3 = 'Spring 2013';
        $this->acceptable3 = 'Good Progress';
        $this->activity4 = '5 Semesters';
        $this->completed4 = 'Fall 2013';
        $this->acceptable4 = 'Good Progress';
        $this->activity5 = '6 Semesters';
        $this->completed5 = 'Spring 2014';
        $this->acceptable5 = 'Good Progress';
        $this->activity6 = '6 Semesters';
        $this->completed6 = 'Spring 2014';
        $this->acceptable6 = 'Good Progress';
        $this->activity7 = '5 Semesters';
        $this->completed7 = 'Fall 2013';
        $this->acceptable7 = 'Good Progress';
        $this->activity8 = '7 Semesters';
        $this->completed8 = 'Fall 2014';
        $this->acceptable8 = 'Good Progress';
        $this->activity9 = '10 Semesters';
        $this->completed9 = 'Spring 2015';
        $this->acceptable9 = 'Good Progress';
        $this->question1 = 'YES';
        $this->question2 = 'The student is on track and has made significant progress. This student should be set to graduate at the end of this semester.';
    }

    // Method for creating student Neal
    function create_Neal()
    {
        $this->date_completed = 'December 25, 2015';
        $this->student_Name = 'Neal Cates';
        $this->student_ID = 'u0456789';
        $this->degree = 'Computer Science';
        $this->track = 'Data';
        $this->semester_Admitted = 'Fall 2013';
        $this->num_semesters = 3;
        $this->advisor = 'James Good';
        $this->committee = array("Peter", "Jim", "Joe", "Mark");
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }

    // Method for creating student Sam
    function create_Sam()
    {
        $this->date_completed = 'November 10, 2012';
        $this->student_Name = 'Sam Bradford';
        $this->student_ID = 'u0678999';
        $this->degree = 'Computer Science';
        $this->track = 'Data';
        $this->semester_Admitted = 'Fall 2013';
        $this->num_semesters = 3;
        $this->advisor = 'James Good';
        $this->committee = array("Peter", "Jim", "Joe", "Mark");
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }
}
