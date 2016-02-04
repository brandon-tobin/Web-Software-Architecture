<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Student Forms Model -- Represents a list of forms for student
 *
 */

class Student
{
    public $student_First_Name;
    public $form_count;
    public $form_Records_Array;

    // Constructor
    public function __construct($id)
    {
      /*  if ($id == 1) {
            $this->create_Anne($id);
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
        }*/
        $this->create_Anne($id);
    }

    // Method for creating Anne's list of forms
    function create_Anne($id)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=Grad_Prog_V3;charset=utf8", 'root', '173620901');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $query = "SELECT name FROM Users WHERE uid = $id";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->advisor_First_Name = $row['name'];
            }

            $query = "SELECT meets_requirements, uid, fid, date, modified_date FROM Forms WHERE uid = $id";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $this->form_Records_Array = array();
            foreach ($result as $row)
            {
                $requirementsMet = "No";
                if ($row['meets_requirements'] == 1)
                    $requirementsMet = "Yes";

               $this->form_Records_Array[] = array($row['date'], $row['modified_date'], $requirementsMet, "<a href=\"progress_form.php?id=$id&form=".$row['fid']."\">View</a>" );
            }
       // $this->student_First_Name = 'Anne';
       // $this->form_count = 1;
       // $this->form_Records_Array = array("January 18, 2016", "January 18, 2016", "Yes", "progress_form.php?id=1");
        }
        catch (PDOException $ex)
        {
        }
    }

    // Method for creating Mike's list of forms
    function create_Mike()
    {
        $this->student_First_Name = 'Mike';
        $this->form_count = 3;
        $this->form_Records_Array = array("December 8, 2014", "December 23, 2014", "No", "progress_form.php?id=2",
            "May 5, 2014", "May 5, 2014", "No", "progress_form.php?id=2",
            "December 1, 2013", "December 25, 2013", "No", "progress_form.php?id=2");
    }

    // Method for creating Brad's list of forms
    function create_Brad()
    {
        $this->student_First_Name = 'Brad';
        $this->form_count = 3;
        $this->form_Records_Array = array("October 20, 2015", "October 20, 2015", "No", "progress_form.php?id=3",
            "May 5, 2014", "May 5, 2014", "No", "progress_form.php?id=3",
            "December 1, 2013", "December 25, 2013", "No", "progress_form.php?id=3");
    }

    // Method for creating Jessica's list of forms
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

    // Method for creating Neal's list of forms
    function create_Neal()
    {
        $this->student_First_Name = 'Neal';
        $this->form_count = 1;
        $this->form_Records_Array = array("December 25, 2015", "December 25, 2015", "Yes", "progress_form.php?id=5");
    }

    // Method for creating Sam's list of forms
    function create_Sam()
    {
        $this->student_First_Name = 'Sam';
        $this->form_count = 3;
        $this->form_Records_Array = array("November 10, 2012", "November 10, 2012", "No", "progress_form.php?id=6",
            "May 5, 2012", "May 5, 2012", "No", "progress_form.php?id=6",
            "December 1, 2011", "December 25, 2011", "No", "progress_form.php?id=6");
    }
}

