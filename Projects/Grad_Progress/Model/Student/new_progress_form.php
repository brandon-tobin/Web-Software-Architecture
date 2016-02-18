<?php

if (isset($_POST['submit']))
{
    process_form();
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

        return;
    }
}
    function process_form ()
    {
        error_log("Tobin made it here!!!!!!");
    }



