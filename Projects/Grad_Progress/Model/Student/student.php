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
        $this->form_Records_Array = array("January 18, 2016", "January 18, 2016", "Yes", "progress_form.php?id=1");
    }

    function create_Mike()
    {
        $this->student_First_Name = 'Mike';
        $this->form_count = 3;
        $this->form_Records_Array = array("December 8, 2014", "December 23, 2014", "No", "progress_form.php?id=2",
            "May 5, 2014", "May 5, 2014", "No", "progress_form.php?id=2",
            "December 1, 2013", "December 25, 2013", "No", "progress_form.php?id=2");
    }

    function create_Brad()
    {
        $this->student_First_Name = 'Brad';
        $this->form_count = 3;
        $this->form_Records_Array = array("October 20, 2015", "October 20, 2015", "No", "progress_form.php?id=3",
            "May 5, 2014", "May 5, 2014", "No", "progress_form.php?id=3",
            "December 1, 2013", "December 25, 2013", "No", "progress_form.php?id=3");
    }

    function create_Jessica()
    {
        $this->student_First_Name = 'Jessica';
        $this->form_count = 11;
        $this->form_Records_Array = array("January 20, 2016", "January 20, 2016", "Yes", "progress_form.php?id=4",
            "September 6, 2015", "September 20, 2015", "Yes", "progress_form.php?id=4",
            "February 14, 2015", "February 17, 2015", "Yes", "progress_form.php?id=4",
            "October 23, 2014", "October 23, 2014", "Yes", "progress_form.php?id=4",
            "January 28, 2014", "January 29, 2014", "Yes", "progress_form.php?id=4",
            "September 11, 2013", "September 11, 2013", "Yes", "progress_form.php?id=4",
            "March 27, 2013", "March 28, 2013", "Yes", "progress_form.php?id=4",
            "November 2, 2012", "November 2, 2012", "Yes", "progress_form.php?id=4",
            "January 10, 2012", "January 10, 2012", "Yes", "progress_form.php?id=4",
            "August 29, 2011", "August 30, 2011", "Yes", "progress_form.php?id=4",
            "January 4, 2011", "January 4, 2011", "Yes", "progress_form.php?id=4");
    }

    function create_Neal()
    {
        $this->student_First_Name = 'Neal';
        $this->form_count = 1;
        $this->form_Records_Array = array("December 25, 2015", "December 25, 2015", "Yes", "progress_form.php?id=5");
    }

    function create_Sam()
    {
        $this->student_First_Name = 'Sam';
        $this->form_count = 3;
        $this->form_Records_Array = array("November 10, 2012", "November 10, 2012", "No", "progress_form.php?id=6",
            "May 5, 2012", "May 5, 2012", "No", "progress_form.php?id=6",
            "December 1, 2011", "December 25, 2011", "No", "progress_form.php?id=6");
    }
}

