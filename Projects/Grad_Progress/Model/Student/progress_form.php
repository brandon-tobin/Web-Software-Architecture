<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Progress Forms Model
 *
 */

class Student_Form
{
    public $date_completed;
   // public $date_modified;
    public $student_Name;
    public $student_ID;
    public $degree;
    public $track;
    public $semester_Admitted;
    public $num_semesters;
    public $advisor;
    public $committee0;
    public $committee1;
    public $committee2;
    public $committee3;

    // Not sure if needed
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

    public function __construct($id)
    {
        if ($id == 1)
        {
            $this->create_Anne();
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
        }
    }

    function create_Anne()
    {
        $this->date_completed = 'January 18, 2016';
        $this->student_Name = 'Anne Smith';
        $this->student_ID = 'u0123456';
        $this->degree = 'Computer Science';
        $this->track = 'Networking';
        $this->semester_Admitted = 'Fall 2015';
        $this->num_semesters = 1;
        $this->advisor = 'Peter James';
        $this->committee0 = 'Peter';
	    $this->committee1 = 'Jim';
	    $this->committee2 = 'Joe';
	    $this->committee3 = 'Mark';
        $this->activity1 = '1 Semester';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Good Progress';
        $this->question1 = 'YES';
        $this->question2 = 'The student is on track and making good progress.';
    }

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
        $this->committee0 = 'Peter';
        $this->committee1 = 'Jim';
        $this->committee2 = 'Joe';
        $this->committee3 = 'Mark';
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }

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
        $this->committee0 = 'Peter';
        $this->committee1 = 'Jim';
        $this->committee2 = 'Joe';
        $this->committee3 = 'Mark';
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }

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
        $this->committee0 = 'Peter';
        $this->committee1 = 'Jim';
        $this->committee2 = 'Joe';
        $this->committee3 = 'Mark';
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
        $this->committee0 = 'Peter';
        $this->committee1 = 'Jim';
        $this->committee2 = 'Joe';
        $this->committee3 = 'Mark';
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }

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
        $this->activity1 = '2 Semesters';
        $this->completed1 = 'Fall 2015';
        $this->acceptable1 = 'Acceptable Progress';
        $this->question1 = 'NO';
        $this->question2 = 'The student is not on track and should be removed from the program.';
    }
}
