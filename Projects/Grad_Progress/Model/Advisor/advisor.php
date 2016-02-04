<?php
/**
 * Author: Brandon Tobin
 * Date: Spring 2016
 *
 * Advisor Model -- Represents an advisor object who has a list of students
 *
 */
set_include_path("../");

require 'db_config.php';

class Advisor
{
    public $advisor_First_Name;
    public $advisor_Last_Name;
    public $student_Array;
    public $student_Count;

    // Constructor
    public function __construct($id)
    {
            if ($id == 1) {
                $this->create_Peter();
            }
            if ($id == 2) {
                $this->create_James();
            }
            if ($id == 3) {
                $this->create_Brandon();
            }
    }

    // Method for creating advisor Peter
    function create_Peter()
    {
        try {

            $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $query = "SELECT name FROM users WHERE uid = 1";

            $statement = $db->prepare($query);
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $this->advisor_First_Name = $row['name'];
            }
            //$this->advisor_Last_Name = 'James';
            $this->student_Array = array("Anne Smith", "In", "January 18, 2016", "Current", "Yes", "../Student/student_forms.php?id=1");
            $this->student_Count = 1;
        }
        catch (PDOException $ex) {
            error_log("Tobin ----> ".$ex);
        }

    }

    // Method for creating advisor Brandon
    function create_James()
    {
        $this->advisor_First_Name = 'James';
        $this->advisor_Last_Name = 'Good';
        $this->student_Array = array("Mike Jones", "Out", "December 23, 2014", "Out of Date", "No", "../Student/student_forms.php?id=2",
            "Brad Rust", "Out", "October 20, 2015", "Out of Date", "Yes", "../Student/student_forms.php?id=3",
            "Neal Cates", "In", "December 25, 2015", "Current", "Yes", "../Student/student_forms.php?id=5",
            "Sam Bradford", "Out", "November 10, 2012", "Out of Date", "No", "../Student/student_forms.php?id=6");
        $this->student_Count = 4;
    }

    // Method for creating advisor Brandon
    function create_Brandon()
    {
        $this->advisor_First_Name = 'Brandon';
        $this->advisor_Last_Name = 'Barnes';
        $this->student_Array = array("Jessica Brown", "In", "January 19, 2016", "Current", "Yes", "../Student/student_forms.php?id=4");
        $this->student_Count = 1;
    }
}