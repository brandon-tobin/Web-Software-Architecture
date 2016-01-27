<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms Model
 *
 */

class Student
{
    public $student_First_Name;
    public $form_count;
    public $form_Records_Array;


    public function __construct($id)
    {
        if ($id == 1) {
            $this->create_Anne();
        }
        if ($id == 2) {
            $this->create_Mike();
        }
        if ($id == 3) {
            $this->create_Brad();
        }
        if ($id == 4) {
            $this->create_Jessica();
        }
        if ($id == 5) {
            $this->create_Neal();
        }
        if ($id == 6) {
            $this->create_Sam();
        }
    }

    function create_Anne()
    {
        $this->student_First_Name = 'Anne';
        $this->form_count = 1;
        $this->form_Records_Array = array("January 18, 2016", "January 18, 2016", "Yes", "Student/progress_form.php?id=1");
    }

    function create_Mike()
    {

    }

    function create_Brad()
    {

    }

    function create_Jessica()
    {
        $this->student_First_Name = 'Jessica';
        $this->form_count = 11;
        $this->form_Records_Array = array("January 20, 2016", "January 20, 2016", "Yes", "Student/progress_form.php?id=4",
            "September 6, 2015", "September 20, 2015", "Yes", "Student/progress_form.php?id=4",
            "February 14, 2015", "February 17, 2015", "Yes", "Student/progress_form.php?id=4",
            "October 23, 2014", "October 23, 2014", "Yes", "Student/progress_form.php?id=4",
            "January 28, 2014", "January 29, 2014", "Yes", "Student/progress_form.php?id=4",
            "September 11, 2013", "September 11, 2013", "Yes", "Student/progress_form.php?id=4",
            "March 27, 2013", "March 28, 2013", "Yes", "Student/progress_form.php?id=4",
            "November 2, 2012", "November 2, 2012", "Yes", "Student/progress_form.php?id=4",
            "January 10, 2012", "January 10, 2012", "Yes", "Student/progress_form.php?id=4",
            "August 29, 2011", "August 30, 2011", "Yes", "Student/progress_form.php?id=4",
            "January 4, 2011", "January 4, 2011", "Yes", "Student/progress_form.php?id=4");
    }

    function create_Neal()
    {

    }

    function create_Sam()
    {

    }
}

